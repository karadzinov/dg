<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;

class AIInvitationController extends Controller
{
    public function submit(Request $request)
    {
        $user_id = Auth::user() ? Auth::user()->id : null; // Get user ID if authenticated

        // Prepare data for the Invitation model
        $data = [
            'mr' => $request->input('mr'),
            'mrs' => $request->input('mrs'),
            'email' => $request->input('email'),
            'date' => $request->input('date'),
            'basic_url' => $request->input('basic_url'),
            'template' => $request->input('template'),
            'male_photo' => '/'. $request->input('male_photo'),  // Assuming you're passing the path to the image
            'female_photo' => '/'. $request->input('female_photo'),
            'group_photo' => '/'. $request->input('group_photo'),
            'restaurant_id' => $request->input('restaurant_id'),
            'user_id' => $user_id,
        ];

        // Create the invitation using the model method
        $invitation = Invitation::createInvitation($data);

        // Return the response
        return response()->json([
            'status' => 200,
            'message' => 'Invitation created successfully',
            'data' => $invitation
        ]);
    }
}
