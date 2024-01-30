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
        Log::info($fbuser);
        $user = User::updateOrCreate([
            'email' => $fbuser->email,
        ], [
            'name' => $fbuser->name,
            'email' => $fbuser->email,
            'password' => Hash::make("temp12345"),
            'facebook_id' => $fbuser->id,
        ]);

        Auth::login($user);

        return redirect('/');

    }


}
