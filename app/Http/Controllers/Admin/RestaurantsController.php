<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('position', 'asc')->get();
        $data = ['restaurants' => $restaurants];

        return view('admin.restaurants.index')->with($data);
    }

    public function position(Request $request)
    {
        $restaurant = Restaurant::where('position', '=', $request->get('fromindex'))->first();
        $restaurant->update(['position' => $request->get('toindex')]);


        $restaurant = Restaurant::where('position', '=', $request->get('toindex'))->first();
        $restaurant->update(['position' => $request->get('fromindex')]);
        return response()->json("success", 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index');
    }
}
