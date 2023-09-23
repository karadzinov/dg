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
            'subtitle' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'capacity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $phone = $request->get('phone');
        $description = $request->get('description');
        $subtitle = $request->get('subtitle');
        $address = $request->get('address');
        $city = $request->get('city');
        $capacity = $request->get('capacity');
        $menuDiscount = $request->get('menuDiscount');
        $menuMin = $request->get('menuMin');
        $menuMax = $request->get('menuMax');
        $facebook = $request->get('facebook');
        $instagram = $request->get('instagram');
        $twitter = $request->get('twitter');
        $youtube = $request->get('youtube');
        $weblink = $request->get('weblink');

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
            'subtitle' => $subtitle,
            'address' => $address,
            'city_id' => $city,
            'capacity' => $capacity,
            'coverImg' => $coverImg,
            'logo' => $logo,
            'menuDiscount' => $menuDiscount,
            'menuMin' => $menuMin,
            'menuMax' => $menuMax,
            'user_id' => $user->id,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'weblink' => $weblink,
        ]);

        $restaurant = Restaurant::where('logo', $logo)->first();
        $contactName = $request->get('contactName');
        $contactPosition = $request->get('contactPosition');
        $contactEmail = $request->get('contactEmail');
        $contactPhone = $request->get('contactPhone');
        $contactDescription = $request->get('desc');
        $count = count($contactName);

        for ($i = 0; $i < $count; $i++) {

            Contact::create([
                'contactName' => $contactName[$i],
                'contactPosition' => $contactPosition[$i],
                'contactEmail' => $contactEmail[$i],
                'contactPhone' => $contactPhone[$i],
                'desc' => $contactDescription[$i],
                'restaurant_id' => $restaurant->id,
            ]);

        };

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants
        ];
        return view('users.index')->with($data);
    }


    public function edit($id)
    {
        $restaurant = Restaurant::FindorFail($id);
        $cities = City::all();
        $contacts = Contact::where('restaurant_id', $id)->get();

        $data = [
            'restaurant' => $restaurant,
            'cities' => $cities,
            'contacts' => $contacts
        ];

        return view('restaurants.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'coverImg' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'subtitle' => 'required',
            'address' => 'required',
            'city' => 'required',
            'capacity' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $restaurant = Restaurant::FindorFail($id);

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

        $input = $request->all();
        $input['logo'] = $logo;
        $input['coverImg'] = $coverImg;

        $restaurant->fill($input)->save();

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants
        ];
        return view('users.index')->with($data);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::FindorFail($id);
        $restaurant->delete();

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants
        ];
        return view('users.index')->with($data);
    }
}
