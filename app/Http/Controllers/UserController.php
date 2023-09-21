<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants
        ];
        return view('users.index')->with($data);
    }
}
