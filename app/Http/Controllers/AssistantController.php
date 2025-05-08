<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AssistantController extends Controller
{
    public function index()
    {
        // Logic for rendering chat or returning initial responses
        return view('chatbot');
    }

    public function chat(Request $request)
    {
        $assistantId = 'asst_GrQszIzxMiN24k1OHIvrAUmY';

        // 1. Create a thread to start the conversation
        $thread = OpenAI::threads()->create([]);

        // 2. Add the user's message to the thread
        OpenAI::threads()->messages()->create($thread->id, [
            'role' => 'user',
            'content' => $request->input('message')
        ]);

        // 3. Start a run with the assistant
        $run = OpenAI::threads()->runs()->create($thread->id, [
            'assistant_id' => $assistantId,
        ]);

        // 4. Poll for the response (simplified, not production-safe)
        do {
            $run = OpenAI::threads()->runs()->retrieve($thread->id, $run->id);
        } while ($run->status !== 'completed');

        // 5. Get the last message from the assistant
        $messages = OpenAI::threads()->messages()->list($thread->id);

        // 6. Extract the assistant's reply from the response structure
        $assistantReply = collect($messages->data)
            ->firstWhere('role', 'assistant')?->content[0]?->text?->value;

        // Debugging: Log the raw response for inspection
        \Log::info('Assistant Response:', ['messages' => $messages->data]);

        // 7. Return the assistant's reply, not the user's input
        return response()->json(['reply' => $assistantReply]);
    }
}

