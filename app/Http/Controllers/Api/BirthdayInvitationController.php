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

        // 1. Handle file upload
        if ($request->hasFile('group_photo')) {
            $image = $request->file('group_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/invitations'), $imageName);
            $data['group_photo'] = $imageName;

            // 2. Handle public image URL (like from OpenAI DALL-E)
        } elseif (filter_var($data['group_photo'], FILTER_VALIDATE_URL)) {
            $url = $data['group_photo'];
            $extension = strtolower(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION)) ?: 'jpg';

            // Use @ for silent error handling if image is not downloadable
            $imageContents = @file_get_contents($url);

            if ($imageContents === false) {
                return response()->json([
                    'success' => false,
                    'error' => 'Could not download the image from the provided URL.'
                ], 400);
            }

            $imageName = time() . '_url.' . $extension;
            file_put_contents(public_path('images/invitations/' . $imageName), $imageContents);
            $data['group_photo'] = $imageName;

            // 3. Handle base64-encoded image
        } elseif (is_string($data['group_photo']) && preg_match('/^data:image\/(\w+);base64,/', $data['group_photo'], $type)) {
            $dataString = substr($data['group_photo'], strpos($data['group_photo'], ',') + 1);
            $imageContents = base64_decode($dataString);

            if ($imageContents === false) {
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid base64 image data.'
                ], 400);
            }

            $extension = strtolower($type[1]) === 'jpeg' ? 'jpg' : strtolower($type[1]);
            $imageName = time() . '_base64.' . $extension;
            file_put_contents(public_path('images/invitations/' . $imageName), $imageContents);
            $data['group_photo'] = $imageName;

        } else {
            return response()->json([
                'success' => false,
                'error' => 'No valid image provided for group_photo.'
            ], 400);
        }

        // Now $data['group_photo'] is the filename of the stored image.
        return $this->BirthdayInvitationService->create($data);
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
