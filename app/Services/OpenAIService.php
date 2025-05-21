<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    protected string $apiKey;
    protected string $threadId;
    protected string $assistantId;
    protected string $vectorStoreId;

    public function __construct()
    {
        $this->apiKey = config('openai.api_key');
        $this->threadId = 'thread_vSSO5i6GGphalTFXasOx8avY';
        $this->assistantId = 'asst_GrQszIzxMiN24k1OHIvrAUmY';
        $this->vectorStoreId = 'vs_681c61fde4c88191ba75ab5c23fce9bb';
    }

    public function sendMessageAndGetReply(string $userMessage): string
    {
        $this->sendMessage($userMessage);
        $runId = $this->startRun();

        $status = $this->pollRunStatus($runId);

        if ($status === 'requires_action') {
            $this->handleToolCalls($runId);
            $status = $this->pollRunStatus($runId);
        }

        if ($status !== 'completed') {
            throw new \Exception("Run did not complete in time.");
        }

        return $this->getAssistantReply();
    }

    protected function sendMessage(string $message): void
    {
        $response = Http::withToken($this->apiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->post("https://api.openai.com/v1/threads/{$this->threadId}/messages", [
                'role' => 'user',
                'content' => $message,
            ]);

        Log::info("Message Response:", ['response' => $response->json()]);

        if (!$response->ok()) {
            throw new \Exception("Message failed: " . json_encode($response->json()));
        }
    }

    protected function startRun(): string
    {
        $response = Http::withToken($this->apiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->post("https://api.openai.com/v1/threads/{$this->threadId}/runs", [
                'assistant_id' => $this->assistantId,
                'tools' => [['type' => 'submit_invitation_form']],
            ]);

        if (!$response->ok()) {
            throw new \Exception("Run start failed: " . json_encode($response->json()));
        }

        return $response->json('id');
    }

    protected function pollRunStatus(string $runId): string
    {
        $maxAttempts = 20;
        $attempt = 0;
        $delay = 1;

        do {
            sleep($delay);
            $response = Http::withToken($this->apiKey)
                ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
                ->get("https://api.openai.com/v1/threads/{$this->threadId}/runs/{$runId}");

            Log::info("Polling Run Status:", ['response' => $response->json()]);

            if (!$response->ok()) {
                throw new \Exception("Run status failed: " . json_encode($response->json()));
            }

            $status = $response->json('status');

            if (in_array($status, ['completed', 'requires_action'])) {
                return $status;
            }

            $attempt++;
            $delay *= 2;
        } while ($attempt < $maxAttempts);

        return 'timeout';
    }

    protected function handleToolCalls(string $runId): void
    {
        $response = Http::withToken($this->apiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->get("https://api.openai.com/v1/threads/{$this->threadId}/runs/{$runId}/steps");

        Log::info("Run Steps:", ['response' => $response->json()]);

        $toolCalls = collect($response->json('data'))
            ->filter(fn($step) => $step['type'] === 'tool_calls')
            ->flatMap(fn($step) => $step['step_details']['tool_calls'] ?? []);

        foreach ($toolCalls as $toolCall) {
            $function = $toolCall['function']['name'];
            $args = json_decode($toolCall['function']['arguments'], true);
            $toolCallId = $toolCall['id'];

            if ($function === 'submit_invitation_form') {
                $this->handleInvitationTool($runId, $toolCallId, $args);
            }
        }
    }

    protected function handleInvitationTool(string $runId, string $toolCallId, array $args): void
    {
        // Assuming $args has fields needed to create invitation
        $response = Http::withToken(env('DRAGI_GOSTI_API_TOKEN'))
            ->post('https://dragigosti.com/api/v1/ai-submit-invitation', $args);

        $output = $response->ok()
            ? ['message' => '🎉 Поканата е успешно креирана!']
            : ['message' => '❌ Се случи грешка при креирање на поканата.'];

        Http::withToken($this->apiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->post("https://api.openai.com/v1/threads/{$this->threadId}/runs/{$runId}/submit_tool_outputs", [
                'tool_outputs' => [[
                    'tool_call_id' => $toolCallId,
                    'output' => $output,
                ]]
            ]);
    }

    protected function checkRestaurantInVectorStore($restaurantId): bool
    {
        // This function would query your vector store for the restaurant ID
        // Example: Return true if found in the vector store, false otherwise

        $vectorStore = json_decode(file_get_contents(storage_path('app/vector_store/restaurants.json')), true);

        foreach ($vectorStore as $restaurant) {
            if ($restaurant['id'] === $restaurantId) {
                return true;
            }
        }

        return false;
    }

    protected function getAssistantReply(): string
    {
        $response = Http::withToken($this->apiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->get("https://api.openai.com/v1/threads/{$this->threadId}/messages");

        Log::info("Messages Response:", ['response' => $response->json()]);

        if (!$response->ok()) {
            throw new \Exception("Fetch failed: " . json_encode($response->json()));
        }

        $messages = $response->json('data');

        return collect($messages)
            ->firstWhere('role', 'assistant')['content'][0]['text']['value'] ?? 'No reply from assistant.';
    }
}
