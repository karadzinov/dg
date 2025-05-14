<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AssistantController extends Controller
{
    public function index()
    {
        return view('chatbot');
    }

    public function chat(Request $request)
    {
        $openaiKey = config('openai.api_key');
        $threadId = 'thread_vSSO5i6GGphalTFXasOx8avY';
        $assistantId = 'asst_GrQszIzxMiN24k1OHIvrAUmY';

        Log::info("Incoming user message:", ['message' => $request->input('message')]);

        // Step 1: Send user message
        $messageResponse = Http::withToken($openaiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->post("https://api.openai.com/v1/threads/{$threadId}/messages", [
                'role' => 'user',
                'content' => $request->input('message'),
            ]);

        // Log the message response
        Log::info("Message Response:", ['response' => $messageResponse->json()]);

        if (!$messageResponse->ok()) {
            Log::error("Failed to send message", ['response' => $messageResponse->json()]);
            return response()->json(['error' => 'Message failed', 'details' => $messageResponse->json()], 400);
        }

        // Step 2: Start a run
        $runResponse = Http::withToken($openaiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->post("https://api.openai.com/v1/threads/{$threadId}/runs", [
                'assistant_id' => $assistantId,
                'tools' => [['type' => 'file_search']],
                'tool_resources' => [
                    'file_search' => [
                        'vector_store_ids' => ['vs_681c61fde4c88191ba75ab5c23fce9bb']  // Ensure this ID is valid
                    ]
                ]
            ]);

        // Log the run response
        Log::info("Run Response:", ['response' => $runResponse->json()]);

        if (!$runResponse->ok()) {
            Log::error("Failed to start run", ['response' => $runResponse->json()]);
            return response()->json(['error' => 'Run failed', 'details' => $runResponse->json()], 400);
        }

        $runId = $runResponse->json('id');

        // Step 3: Poll for run status or tool calls
        $maxAttempts = 20;
        $attempt = 0;
        $status = null;
        $backoffDelay = 1;  // Initial polling delay

        do {
            sleep($backoffDelay);
            $statusResponse = Http::withToken($openaiKey)
                ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
                ->get("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}");

            // Log the status response
            Log::info("Status Response:", ['response' => $statusResponse->json()]);

            if (!$statusResponse->ok()) {
                Log::error("Status check failed", ['response' => $statusResponse->json()]);
                return response()->json(['error' => 'Status check failed', 'details' => $statusResponse->json()], 400);
            }

            $status = $statusResponse->json('status');
            if ($status === 'requires_action') {
                break;
            }

            $attempt++;
            $backoffDelay *= 2;  // Increase delay after each attempt
        } while ($status !== 'completed' && $attempt < $maxAttempts);

        // Step 4: Handle tool calls if needed
        if ($status === 'requires_action') {
            $runStepsResponse = Http::withToken($openaiKey)
                ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
                ->get("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}/steps");

            // Log the run steps response
            Log::info("Run Steps Response:", ['response' => $runStepsResponse->json()]);

            $toolCalls = collect($runStepsResponse->json('data'))
                ->filter(fn($step) => $step['type'] === 'tool_calls')
                ->flatMap(fn($step) => $step['step_details']['tool_calls'] ?? []);

            foreach ($toolCalls as $toolCall) {
                $functionName = $toolCall['function']['name'];
                $arguments = json_decode($toolCall['function']['arguments'], true);
                $toolCallId = $toolCall['id'];

                if ($functionName === 'submit_invitation_form') {
                    // Handle tool call by making the request
                    $localResponse = Http::withToken(env('DRAGI_GOSTI_API_TOKEN'))
                        ->post('http://localhost/api/v1/ai-submit-invitation', $arguments);

                    $resultText = $localResponse->ok()
                        ? '🎉 Поканата е успешно креирана!'
                        : '❌ Се случи грешка при креирање на поканата.';

                    // Submit tool output response
                    $toolOutputResponse = Http::withToken($openaiKey)
                        ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
                        ->post("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}/submit_tool_outputs", [
                            'tool_outputs' => [[
                                'tool_call_id' => $toolCallId,
                                'output' => $resultText
                            ]]
                        ]);

                    if (!$toolOutputResponse->ok()) {
                        Log::error("Tool output submission failed", ['response' => $toolOutputResponse->json()]);
                    }

                    // Poll again for final response
                    $attempt = 0;
                    do {
                        sleep(1);
                        $statusResponse = Http::withToken($openaiKey)
                            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
                            ->get("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}");

                        $status = $statusResponse->json('status');
                        $attempt++;
                    } while ($status !== 'completed' && $attempt < $maxAttempts);
                }
            }
        }

        if ($status !== 'completed') {
            Log::error("Run did not complete in time.");
            return response()->json(['error' => 'Run timeout'], 504);
        }

        // Step 5: Fetch messages from assistant
        $messagesResponse = Http::withToken($openaiKey)
            ->withHeaders(['OpenAI-Beta' => 'assistants=v2'])
            ->get("https://api.openai.com/v1/threads/{$threadId}/messages");

        if (!$messagesResponse->ok()) {
            Log::error("Message fetch failed", ['response' => $messagesResponse->json()]);
            return response()->json(['error' => 'Fetch failed', 'details' => $messagesResponse->json()], 400);
        }

        $messages = $messagesResponse->json('data');

        // Log the full messages for debugging
        Log::info("Assistant Messages:", ['messages' => $messages]);

        // Parse the assistant reply
        $assistantReply = collect($messages)
            ->firstWhere('role', 'assistant')['content'][0]['text']['value'] ?? 'No reply from assistant.';

        Log::info("Assistant reply:", ['reply' => $assistantReply]);

        return response()->json(['reply' => $assistantReply]);
    }
}
