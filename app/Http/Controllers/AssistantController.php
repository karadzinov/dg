<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;

class AssistantController extends Controller
{
    public function index()
    {
        // Logic for rendering chat or returning initial responses
        return view('chatbot');
    }

    public function chat(Request $request)
    {
        // Get OpenAI API Key from config
        $openaiKey = config('openai.api_key');
        $threadId = 'thread_9peuChRc6y4cH0rnPpOrvEIV'; // Use the provided thread ID
        $assistantId = 'asst_GrQszIzxMiN24k1OHIvrAUmY'; // Your assistant ID

        // Step 1: Log the incoming message from the user
        \Log::info("Incoming user message:", ['message' => $request->input('message')]);

        // Step 2: Add user message to the thread
        $messageResponse = Http::withToken($openaiKey)
            ->withHeaders([
                'OpenAI-Beta' => 'assistants=v2'
            ])
            ->post("https://api.openai.com/v1/threads/{$threadId}/messages", [
                'role' => 'user',
                'content' => $request->input('message'),
            ]);

        // Log the message response from OpenAI
    //    \Log::info("OpenAI message response:", ['response' => $messageResponse->json()]);

        if (!$messageResponse->ok()) {
            \Log::error("Failed to send message to OpenAI.", ['response' => $messageResponse->json()]);
            return response()->json([
                'error' => 'Failed to send message',
                'details' => $messageResponse->json()
            ], $messageResponse->status());
        }

        // Step 3: Start a run with tools (if applicable)
        $runResponse = Http::withToken($openaiKey)
            ->withHeaders([
                'OpenAI-Beta' => 'assistants=v2'
            ])
            ->post("https://api.openai.com/v1/threads/{$threadId}/runs", [
                'assistant_id' => $assistantId,
                'tools' => [
                    ['type' => 'file_search']
                ],
                'tool_resources' => [
                    'file_search' => [
                        'vector_store_ids' => ['vs_681c61fde4c88191ba75ab5c23fce9bb'] // Example vector store ID
                    ]
                ]
            ]);

        // Log the run response
      //  \Log::info("OpenAI run response:", ['response' => $runResponse->json()]);

        if (!$runResponse->ok()) {
            \Log::error("Failed to start run in OpenAI.", ['response' => $runResponse->json()]);
            return response()->json([
                'error' => 'Failed to start run',
                'details' => $runResponse->json()
            ], $runResponse->status());
        }

        $runId = $runResponse->json('id');

        // Step 4: Poll for completion
        $maxAttempts = 20;
        $attempt = 0;
        $status = null;

    //    \Log::info("Polling for run completion...");

        do {
            sleep(1);
            $statusResponse = Http::withToken($openaiKey)
                ->withHeaders([
                    'OpenAI-Beta' => 'assistants=v2'
                ])
                ->get("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}");

            // Log the polling response
    //        \Log::info("Run status response:", ['response' => $statusResponse->json()]);

            if (!$statusResponse->ok()) {
                \Log::error("Failed to check run status.", ['response' => $statusResponse->json()]);
                return response()->json([
                    'error' => 'Failed to check run status',
                    'details' => $statusResponse->json()
                ], $statusResponse->status());
            }

            $status = $statusResponse->json('status');
            $attempt++;
        } while ($status !== 'completed' && $attempt < $maxAttempts);

        if ($status !== 'completed') {
            \Log::error("Run did not complete in time.");
            return response()->json([
                'error' => 'Run did not complete in time.'
            ], 504);
        }

        // Step 5: Fetch messages from the thread
        $messagesResponse = Http::withToken($openaiKey)
            ->withHeaders([
                'OpenAI-Beta' => 'assistants=v2'
            ])
            ->get("https://api.openai.com/v1/threads/{$threadId}/messages");

        // Log the message fetch response
    //    \Log::info("Fetched messages from thread:", ['response' => $messagesResponse->json()]);

        if (!$messagesResponse->ok()) {
            \Log::error("Failed to fetch messages from OpenAI.", ['response' => $messagesResponse->json()]);
            return response()->json([
                'error' => 'Failed to fetch messages',
                'details' => $messagesResponse->json()
            ], $messagesResponse->status());
        }

        $messages = $messagesResponse->json('data');

        // Extract assistant's reply from the messages
        $assistantReply = collect($messages)
            ->firstWhere('role', 'assistant')['content'][0]['text']['value'] ?? 'No reply from assistant.';

        \Log::info("Assistant reply:", ['reply' => $assistantReply]);

        return response()->json(['reply' => $assistantReply]);
    }


}

