<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreCover;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Http\Controllers\Helpers\ImageStore;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Profile;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();

        $category = Category::where('slug', '=', 'profile')->first();

        $categories = Category::getListFrom($category);

        $data = [
            'cities' => $cities,
            'categories' => $categories
        ];
        return view('profile.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'coverImg' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'city' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {


            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        if ($request->hasFile('logo')) {
            $imageObj = new ImageStoreLogo($request, 'profile');
            $input['logo'] = $imageObj->imageStore('logo');
        }
        if ($request->hasFile('coverImg')) {

            $imageObj = new ImageStoreCover($request, 'profile');
            $input['coverImg'] = $imageObj->imageStore('coverImg');
        }

        $input['user_id'] = Auth::user()->id;

        $input['slug'] = Str::slug($request->get('name'));


        $profile = Profile::create($input);

        $profile->categories()->sync($request->get('category_id'));


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
                'profile_id' => $profile->id,
            ]);

        }

        return redirect()->route('users.index');


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
        $profile = Profile::FindorFail($id);
        $cities = City::all();
        $contacts = Contact::where('profile_id', $profile->id)->get();
        $category = Category::where('slug', '=', 'profile')->first();

        $categories = Category::getListFrom($category);

        $data = [
            'profile' => $profile,
            'cities' => $cities,
            'contacts' => $contacts,
            'categories' => $categories
        ];

        return view('profile.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $input = $request->all();

        if ($request->hasFile('logo')) {
            $imageObj = new ImageStoreLogo($request, 'profile');
            $input['logo'] = $imageObj->imageStore('logo');
        }
        if ($request->hasFile('coverImg')) {

            $imageObj = new ImageStoreCover($request, 'profile');
            $input['coverImg'] = $imageObj->imageStore('coverImg');
        }

        $input['user_id'] = Auth::user()->id;

        $input['slug'] = Str::slug($request->get('name'));

        $profile->fill($input)->save();


        $contacts = Contact::where('profile_id', '=', $profile->id)->get();
        foreach ($contacts as $contact) {
            $contact->delete();
        }

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
                'profile_id' => $profile->id,
            ]);

        }

        return redirect()->route('users.index');
    }

    public function gallery(Profile $profile)
    {

        return view('profile.gallery')->with(['profile' => $profile]);
    }

    public function galleryStore(Request $request, Profile $profile)
    {
        $imageObj = new ImageStore($request, 'gallery');





        foreach($request->images as $image) {

            $image = $imageObj->imagesStore($image);


            $gallery = Gallery::where('profile_id', '=', $profile->id)->orderBy('id', 'desc')->first();
            if(!$gallery) {
                $position = 1;
            }  else {
                $position = $gallery->position + 1;
            }


            Gallery::create([
                'image'  => $image,
                'profile_id' => $profile->id,
                'position' =>  $position
            ]);
        }
        Session::flash('flash_message', 'Images successfully uploaded!');
        return view('profile.gallery')->with(['profile' => $profile]);
    }

    public function galleryPosition(Request $request, Profile $profile)
    {
        $image = Gallery::where('position', '=', $request->get('fromindex'))->where('profile_id', '=', $profile->id)->first();
        $image->update(['position' => $request->get('toindex')]);


        $image = Gallery::where('position', '=', $request->get('toindex'))->where('profile_id', '=', $profile->id)->first();
        $image->update(['position' => $request->get('fromindex')]);
        return response()->json("success", 200);
    }

    public function galleryDestroy(Request $request, Gallery $gallery)
    {
        try {
            unlink(public_path() . '/images/gallery/medium/' . $gallery->image);
            unlink(public_path() . '/images/gallery/originals/' . $gallery->image);
            unlink(public_path() . '/images/gallery/thumbnails/' . $gallery->image);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        $gallery->delete();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {

        $contacts = Contact::where('profile_id', '=', $profile->id)->get();
        foreach ($contacts as $contact) {
            $contact->delete();
        }

        try {
            unlink(public_path() . '/images/logos/profile/medium/' . $profile->logo);
            unlink(public_path() . '/images/logos/profile/originals/' . $profile->logo);
            unlink(public_path() . '/images/logos/profile/thumbnails/' . $profile->logo);


            unlink(public_path() . '/images/cover_images/profile/medium/' . $profile->coverImg);
            unlink(public_path() . '/images/cover_images/profile/originals/' . $profile->coverImg);
            unlink(public_path() . '/images/cover_images/profile/thumbnails/' . $profile->coverImg);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        $profile->delete();

        return redirect()->route('users.index');
    }
}
