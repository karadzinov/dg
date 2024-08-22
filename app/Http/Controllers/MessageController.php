<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request, $id)
    {

        $input = $request->all();
        $restaurant = Restaurant::Find($id);
        if ($restaurant) {
            $input['restaurant'] = $restaurant->name;
        } else {
            $profile = Profile::Find($id);
            $input['profile'] = $profile->name;
        }


        Log::info($input);

        return redirect()->back();
    }
}
