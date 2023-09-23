<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmInvitation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Guests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function index()
    {
        $images = \File::allFiles(public_path('images/guests'));


        $data = ["images" => $images];
        return view('main')->with($data);

    }

    public function restaurants()
    {
        $restaurants = Restaurant::all();

        $data = [
            'restaurants' => $restaurants
        ];

        return view('restaurants.index')->with($data);
    }

    public function profile($slug)
    {

        if ($slug === "alikas") {
            $data = ["slug" => $slug, "name" => "Аликас"];
        } else if ($slug === "ksantika") {
            $data = ["slug" => $slug, "name" => "Ксантика"];
            return view('ksantika')->with($data);
        } else {
            $data = ["slug" => $slug, "name" => "Аликас"];
        }


        return view('profile')->with($data);


    }

    public function link($link)
    {
        $link = Link::where('link', $link)->first();
        $guests = Guests::select('name')->where('link_id', '=', $link->id)->get()->toArray();

        if (count($guests) > 1) {
            $others = [];

            foreach ($guests as $guest) {
                $others[] = $guest['name'];
            }

            $last = array_pop($others);
            $str = implode(',', $others) . ' и ' . $last;

        } else {

            $str = $guests[0]['name'];
        }


        $guests = Guests::where('link_id', '=', $link->id)->get();


        $data = ['str' => $str, 'guests' => $guests, "link" => $link];

        return view('guests')->with($data);

    }

    public function confirm(Request $request)
    {


        $guest = Guests::where('id', $request->get('id'))->first();
        $guest->confirmed = true;
        if ($request->has('email') && $request->get('email') != '') {
            $guest->email = $request->get('email');
            $message = 'Еј фала!';
            Mail::to($guest->email)->send(new ConfirmInvitation($message));
        }
        $guest->save();


        $session = Session::flash('success', 'This is a message!');
        return redirect()->back()->with($session);

    }

    public function plusOne(Request $request)
    {
        $guest = Guests::where('id', '=', $request->get('guest_id'))->first();

        $guest->plus_one = false;
        $guest->save();

        Guests::create(
            $request->all()
        );

        $session = Session::flash('plus_one', 'This is a message!');
        return redirect()->back()->with($session);


    }
}
