<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBirthdayInvitationRequest;
use App\Http\Requests\UpdateBirthdayInvitationRequest;
use App\Services\BirthdayInvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use GuzzleHttp\Client;

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


        $name = $data['name'];       // e.g., "Maria"
        $years = $data['years'];     // e.g., "3"
        $theme = $data['theme'];     // e.g., "unicorns and balloons" or "Cars cartoon"
        $location = $data['location'] ?? null; // optional, e.g., "City Park"

        $prompt = "A fun, colorful cartoon-style birthday invitation for {$name}'s {$years} birthday";
        if (!empty($theme)) {
            $prompt .= " with a theme of {$theme}";
        }
        if (!empty($location)) {
            $prompt .= ", with illustration of {$location}";
        }
        $prompt .= ". Do not include real people. Use only friendly illustrations, balloons, and a festive atmosphere. Leave space for event details.";


        // Call OpenAI DALL-E to generate the image based on the prompt
        $imageUrl = $this->generateInvitationImage($prompt);

        // Immediately download and save the image
        $imageContents = @file_get_contents($imageUrl);
        if ($imageContents === false) {
            return response()->json([
                'success' => false,
                'error' => 'Could not download the image from OpenAI (expired URL).'
            ], 400);
        }
        $imageName = time() . '_openai.png';
        file_put_contents(public_path('images/invitations/' . $imageName), $imageContents);

        // Update data with the stored image name
        $data['group_photo'] = $imageName;

        // Proceed to invitation creation
        return $this->BirthdayInvitationService->create($data);
    }


    public function generateInvitationImage(string $prompt, string $size = '1024x512'): string
    {
        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type'  => 'application/json',
            ],
            'timeout' => 60,
        ]);

        $response = $client->post('images/generations', [
            'json' => [
                'model' => 'dall-e-3', // Or 'dall-e-2' if you want smaller cost or image
                'prompt' => $prompt,
                'n' => 1,
                'size' => $size, // Can be '1024x1024', '512x512', or '256x256'
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['data'][0]['url'])) {
            return $data['data'][0]['url'];
        }

        throw new \Exception('Failed to generate image from OpenAI.');
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
