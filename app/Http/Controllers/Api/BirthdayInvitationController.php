<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBirthdayInvitationRequest;
use App\Http\Requests\UpdateBirthdayInvitationRequest;
use App\Services\BirthdayInvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class BirthdayInvitationController extends Controller
{
    protected $BirthdayInvitationService;

    public function __construct(BirthdayInvitationService $BirthdayInvitationService)
    {
        $this->BirthdayInvitationService = $BirthdayInvitationService;
    }

    public function index()
    {
        return $this->BirthdayInvitationService->getAll();
    }

    public function store(StoreBirthdayInvitationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('group_photo')) {
            // Standard file upload
            $image = $request->file('group_photo');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images/invitations'), $imageName);
            $data['group_photo'] = $imageName;

        } elseif (
            isset($data['group_photo']) &&
            is_string($data['group_photo']) &&
            str_starts_with($data['group_photo'], 'upload://')
        ) {
            // Handle OpenAI-style upload token (must resolve to real file URL)
            try {
                $imageName = $this->resolveOpenAIFileUrl($data['group_photo']);
                $data['group_photo'] = $imageName;
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Failed to fetch image from OpenAI: ' . $e->getMessage()
                ], 400);
            }
        } else {
            // No valid group_photo found
            return response()->json([
                'success' => false,
                'error' => 'group_photo is required and must be a valid image file upload or an OpenAI upload token.'
            ], 400);
        }

        return $this->BirthdayInvitationService->create($data);
    }


    function resolveOpenAIFileUrl($token)
    {
        // For demonstration, extract file ID (the "upload://" is usually just a prefix)
        $fileId = str_replace('upload://', '', $token);

        // OpenAI Files API endpoint
        $endpoint = "https://api.openai.com/v1/files/{$fileId}/content";

        // Your OpenAI API key (store securely!)
        $apiKey = env('OPENAI_API_KEY'); // or config('openai.api_key')

        // Make HTTP GET request to download the file
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->get($endpoint);

        if ($response->successful()) {
            // Save the content to a temporary file and return its path
            $filename = time() . '_' . $fileId . '.jpg'; // You may need to determine the real extension!
            $filepath = public_path('images/invitations/' . $filename);
            file_put_contents($filepath, $response->body());
            return $filename;
        } else {
            throw new Exception('Unable to download file from OpenAI: ' . $response->body());
        }
    }


    public function show($id)
    {
        return $this->BirthdayInvitationService->getById($id);
    }

    public function update(UpdateBirthdayInvitationRequest $request, $id)
    {
        return $this->BirthdayInvitationService->update($id, $request->validated());
    }

    public function destroy($id)
    {
        $this->BirthdayInvitationService->delete($id);
        return response()->json(null, 204);
    }
}
