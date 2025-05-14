<?php

namespace App\Http\Controllers;
use App\Services\OpenAIService;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function chat(Request $request, OpenAIService $openAIService)
    {
        try {
            $reply = $openAIService->sendMessageAndGetReply($request->input('message'));
            return response()->json(['reply' => $reply]);
        } catch (\Throwable $e) {
            Log::error("Chat error", ['message' => $e->getMessage()]);
            return response()->json(['error' => 'Internal error', 'details' => $e->getMessage()], 500);
        }
    }
}
