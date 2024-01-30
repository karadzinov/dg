<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $fbuser = Socialite::driver('facebook')->user();
        Log::info($fbuser->getId());

        $user = User::where('email', '=', $fbuser->getEmail())->first();
        if ($user) {
            $user->facebook_id = $fbuser->getId();
            $user->save();
        } else {
            $user = User::create([
                "name" => $fbuser->getName(),
                "email" => $fbuser->getEmail(),
                "category" => "other",
                "password" => Hash::make("temp12345")
            ]);
        }

        Auth::login($user);

        return redirect()->route('frontend.invitations');

    }


}
