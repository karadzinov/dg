<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreCover;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Models\Album;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Musician;
use App\Models\Photographer;
use App\Models\Picture;
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

        $category = Category::where('slug', '=', 'hoteli-restorani')->first();

        $categories = Category::getListFrom($category);

        $data = [
            'cities' => $cities,
            'categories' => $categories
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
        $lat = $request->get('lat');
        $lng = $request->get('lng');

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

        $restaurant =  Restaurant::create([
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
            'lat' => $lat,
            'lng' => $lng,
        ]);


        $restaurant->categories()->sync($request->get('category_id'));


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

        }

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $musicians = Musician::where('user_id', Auth::user()->id)->get();
        $photographers = Photographer::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants,
            'musicians' => $musicians,
            'photographers' => $photographers
        ];
        return view('users.index')->with($data);
    }


    public function edit($id)
    {
        $restaurant = Restaurant::FindorFail($id);
        $cities = City::all();
        $contacts = Contact::where('restaurant_id', $id)->get();
        $category = Category::where('slug', '=', 'hoteli-restorani')->first();

        $categories = Category::getListFrom($category);

        $data = [
            'restaurant' => $restaurant,
            'cities' => $cities,
            'contacts' => $contacts,
            'categories' => $categories
        ];

        return view('restaurants.edit')->with($data);
    }

    public function update(Request $request, $id)
    {


        $input = $request->all();
        $restaurant = Restaurant::FindorFail($id);

        if ($request->hasFile('logo')) {
            $logo = $request['logo'];
            $imageObj = new ImageStoreLogo($request, 'restaurants');
            $logo = $imageObj->imageStore();
            $input['logo'] = $logo;
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'restaurants');
            $coverImg = $imageObj->imageStore();
            $input['coverImg'] = $coverImg;
        }


        $restaurant->categories()->sync($request->get('category_id'));

        unset($input['category_id']);


        $restaurant->fill($input)->save();

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $musicians = Musician::where('user_id', Auth::user()->id)->get();
        $photographers = Photographer::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants,
            'musicians' => $musicians,
            'photographers' => $photographers
        ];
        return view('users.index')->with($data);
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::FindorFail($id);
        $restaurant->delete();

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
        $musicians = Musician::where('user_id', Auth::user()->id)->get();
        $photographers = Photographer::where('user_id', Auth::user()->id)->get();

        $data = [
            'restaurants' => $restaurants,
            'musicians' => $musicians,
            'photographers' => $photographers
        ];
        return view('users.index')->with($data);
    }

    public function gallery($id)
    {

        $restaurant = Restaurant::FindorFail($id);
        $albums = Album::where('restaurant_id', $restaurant->id)->get();
        $data = [
            'restaurant' => $restaurant,
            'albums' => $albums,
        ];
        return view('restaurants.gallery.index')->with($data);
    }

    public function createGallery($id)
    {
        $restaurant = Restaurant::FindorFail($id);

        $data = [
            'restaurant' => $restaurant,
        ];

        return view('restaurants.gallery.create')->with($data);
    }

    public function storeGallery(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'restaurants');
        $coverImg = $imageObj->imageStore();
        $restaurant = Restaurant::FindorFail($id);

        $album = Album::create([
            'restaurant_id' => $id,
            'name' => $albumName,
            'slug' => $slug,
            'coverImg' => $coverImg
        ]);
        $album_id = $album->id;

        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'image'
        ]);

        $files = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $tempName = $file->getClientOriginalName();
                $name = rand(1000, 100000) . '-' . $tempName;
                $file->move(public_path('images/gallery/restaurants/' . $restaurant->name . '/'), $name);
                $files[] = $name;
            }
        }

        foreach ($files as $file) {
            Picture::create([
                'album_id' => $album_id,
                'image' => $file,
                'restaurant_id' => $id,
            ]);
        }

        $restaurant = Restaurant::FindorFail($id);
        $albums = Album::where('restaurant_id', $restaurant->id)->get();
        $pictures = Picture::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('restaurants.gallery.index')->with($data);
    }

    public function destroyGallery($id)
    {

        $album = Album::FindorFail($id);
        $albumRestaurantID = $album->restaurant_id;
        $album->delete();


        $restaurant = Restaurant::FindorFail($albumRestaurantID);
        $albums = Album::where('restaurant_id', $restaurant->id)->get();
        $pictures = Picture::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('restaurants.gallery.index')->with($data);

    }

    public function createVideo($id)
    {
        $restaurant = Restaurant::FindorFail($id);

        $data = [
            'restaurant' => $restaurant,
        ];

        return view('restaurants.gallery.video')->with($data);
    }

    public function storeVideo(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $restaurant = Restaurant::FindorFail($id);
        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'restaurants');
        $coverImg = $imageObj->imageStore();

        $link = $request->get('youtube_link');

        function getYoutubeEmbedUrl($link){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

            if (preg_match($longUrlRegex, $link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            return 'https://www.youtube.com/embed/' . $youtube_id ;
        }


        $embed_url = getYoutubeEmbedUrl($link);

        $album = Album::create([
            'restaurant_id' => $id,
            'name' => $albumName,
            'slug' => $slug,
            'coverImg' => $coverImg,
        ]);
        $album_id = $album->id;



            Picture::create([
                'album_id' => $album_id,
                'youtube_link' => $embed_url,
                'restaurant_id' => $id,
            ]);


        $restaurant = Restaurant::FindorFail($id);
        $albums = Album::where('restaurant_id', $restaurant->id)->get();
        $pictures = Picture::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('restaurants.gallery.index')->with($data);
    }

    public function albumView($id)
    {
        $album = Album::FindorFail($id);
        $restaurant = Restaurant::FindorFail($album->restaurant_id);
        $pictures = Picture::where('album_id', $id)->get();

        $data = [
            'restaurant' => $restaurant,
            'album' => $album,
            'pictures' => $pictures,
        ];

        return view('restaurants.gallery.album')->with($data);
    }
}
