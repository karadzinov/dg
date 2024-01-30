<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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
            'facebook_id' => $fbuser->id,
        ], [
            'name' => $fbuser->name,
            'email' => $fbuser->email,
        ]);

        Auth::login($user);

        return redirect('/');

    }


}
