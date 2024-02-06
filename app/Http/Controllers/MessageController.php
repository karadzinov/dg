<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function store(Request $request, $id)
    {

       $restaurant = Restaurant::FindOrFail($id);

       $input = $request->all();
       $input['restaurant'] = $restaurant->name;

        Log::info($input);

        return redirect()->back();
    }
}
