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

        $user = User::updateOrCreate([
            'facebook_id' => $fbuser->getId(),
        ], [
            'name' => $fbuser->getName(),
            'email' => $fbuser->getEmail()
        ]);

        Auth::login($user);

        return redirect('/');

    }


}
