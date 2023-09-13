<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
     $restaurants = Restaurant::all();

     $data = [
         'restaurants' => $restaurants
     ];

     return view('restaurants.index')->with($data);
    }
}
