<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreCover;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Models\City;
use App\Models\Contact;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Helpers\ImageStore;
use Illuminate\Support\Facades\Auth;


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

    public function create()
    {
        $cities = City::all();

        $data = [
            'cities' => $cities
        ];
        return view('restaurants.create')->with($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'coverImg' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'capacity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('restaurants.create')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $phone = $request->get('phone');
        $description = $request->get('description');
        $address = $request->get('address');
        $city = $request->get('city');
        $capacity = $request->get('capacity');
        $menuDiscount = $request->get('menuDiscount');
        $menuMin = $request->get('menuMin');
        $menuMax = $request->get('menuMax');

        if ($request->hasFile('logo')) {
            $logo = $request['logo'];
            $imageObj = new ImageStoreLogo($request, 'restaurants');
            $logo = $imageObj->imageStore();
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'restaurants');
            $coverImg = $imageObj->imageStore();
        }

        $user = Auth::user();

        Restaurant::create([
            'name' => $name,
            'slug' => $slug,
            'phone' => $phone,
            'description' => $description,
            'address' => $address,
            'city_id' => $city,
            'capacity' => $capacity,
            'coverImg' => $coverImg,
            'logo' => $logo,
            'menuDiscount' => $menuDiscount,
            'menuMin' => $menuMin,
            'menuMax' => $menuMax,
            'user_id' => $user->id
        ]);

        $restaurant = Restaurant::where('logo', $logo)->first();
        $contactName = $request->get('contactName');
        $contactPosition = $request->get('contactPosition');
        $contactEmail = $request->get('contactEmail');
        $contactPhone = $request->get('contactPhone');
        $contactDescription = $request->get('contactDescription');
        $count = count($contactName);

        for ($i = 0; $i < $count; $i++) {

            Contact::create([
                'contactName' => $contactName[$i],
                'contactPosition' => $contactPosition[$i],
                'contactEmail' => $contactEmail[$i],
                'contactPhone' => $contactPhone[$i],
                'contactDescription' => $contactDescription[$i],
                'restaurant_id' => $restaurant->id,
            ]);

        };

        $restaurants = Restaurant::all();

        $data = [
            'restaurants' => $restaurants
        ];

        return view('restaurants.index')->with($data);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->latest()->first();
        $contact = Contact::where('restaurant_id', $restaurant->id)->first();

        $data = [
            'restaurant' => $restaurant,
            'contact' => $contact
        ];

        return view('restaurants.profile')->with($data);
    }
}
