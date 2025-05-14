<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    private $headers;

    public function __construct()
    {
        $this->headers = [
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'OpenAI-Beta' => 'assistants=v2',
            'Content-Type' => 'application/json',
        ];
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');
        $threadId = Session::get('openai_thread_id');

        if (!$threadId) {
            $response = Http::withHeaders($this->headers)->post('https://api.openai.com/v1/threads');
            $threadId = $response['id'];
            Session::put('openai_thread_id', $threadId);
        }

        Http::withHeaders($this->headers)->post("https://api.openai.com/v1/threads/{$threadId}/messages", [
            'role' => 'user',
            'content' => $userMessage,
        ]);

        $run = Http::withHeaders($this->headers)->post("https://api.openai.com/v1/threads/{$threadId}/runs", [
            'assistant_id' => 'asst_GrQszIzxMiN24k1OHIvrAUmY',
        ]);

        // Poll until run is complete
        $runId = $run['id'];
        do {
            sleep(1);
            $runStatus = Http::withHeaders($this->headers)->get("https://api.openai.com/v1/threads/{$threadId}/runs/{$runId}");
        } while ($runStatus['status'] !== 'completed');

        $messages = Http::withHeaders($this->headers)->get("https://api.openai.com/v1/threads/{$threadId}/messages");
        $lastMessage = $messages['data'][0]['content'][0]['text']['value'];

        return response()->json(['response' => $lastMessage]);
    }
}
