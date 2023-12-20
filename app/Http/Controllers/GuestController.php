<?php

namespace App\Http\Controllers;

use App\Models\Guests;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Invitation $invitation)
    {
        $guests = $invitation->guests();
        $data = ["guests" => $guests, "invitation" => $invitation];
        return view('guests.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invitation $invitation)
    {
        $data = ['invitation' => $invitation];
        return view('guests.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invitation $invitation)
    {
        $link = new Link();
        $link->link = Str::random(5);
        $link->save();
        $names = $request->get('name');
        $email = $request->get('email');
        $plus_one = $request->get('plus_one');
        $plus_one = $plus_one === "on" ? true : false;


        foreach ($names as $index => $name) {
            Guests::create([
                'name' => $name,
                'email' => $email[$index],
                'plus_one' => $plus_one,
                'link_id' => $link->id,
                'invitation_id' => $invitation->id,
                'confirmed' => true
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \DragiGosti\Guests $guests
     * @return \Illuminate\Http\Response
     */
    public function show(Guests $guests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \DragiGosti\Guests $guests
     * @return \Illuminate\Http\Response
     */
    public function edit($link)
    {
        $link = Link::where('link', '=', $link)->with('guests')->first();
        $data = ["link" => $link];
        return view('guests.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \DragiGosti\Guests $guests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $link)
    {
        $link = Link::where('link', '=', $link)->first();
        $names = $request->get('name');
        $email = $request->get('email');
        $plus_one = $request->get('plus_one');
        $plus_one = $plus_one === "on" ? true : false;
        $link->guests()->delete();
        foreach ($names as $index => $name) {
            Guests::create([
                'name' => $name,
                'email' => $email[$index],
                'plus_one' => $plus_one,
                'link_id' => $link->id,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \DragiGosti\Guests $guests
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guests $guest)
    {
        $guest->delete();
        return redirect()->back();
    }
}
