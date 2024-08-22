<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Musician;
use App\Models\Photographer;
use App\Models\Profile;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $musicians = Musician::where('user_id', Auth::user()->id)->get();
        $photographers = Photographer::where('user_id', Auth::user()->id)->get();
        $profiles = Profile::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants,
            'musicians' => $musicians,
            'photographers' => $photographers,
            'profiles' => $profiles
        ];

        return view('users.index')->with($data);
    }

}
