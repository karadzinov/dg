<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStore;
use App\Http\Controllers\Helpers\ImageStoreMultiple;
use App\Models\Album;
use App\Models\File;
use App\Models\Musician;
use App\Models\Photographer;
use App\Models\Picture;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{

    public function create(Request $request, $slug)
    {
        $service = $request->get('service');

        if ($service === 'restaurant') {

            $restaurant = Restaurant::where('slug', $slug)->first();

            $data = [
                'restaurant' => $restaurant,
                'service' => $service
            ];

            return view('gallery.create')->with($data);

        } elseif ($service === 'music') {

            $musician = Musician::where('slug', $slug)->first();

            $data = [
                'musician' => $musician,
                'service' => $service
            ];

            return view('gallery.create')->with($data);

        } elseif ($service === 'photo') {

            $photographer = Photographer::where('slug', $slug)->first();

            $data = [
                'photographer' => $photographer,
                'service' => $service
            ];

            return view('gallery.create')->with($data);

        }

    }

    public function store(Request $request)
    {
        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $service = $request->get('service');
        if ($service === 'restaurant') {
            $id = $request->get('restaurant_id');
            $restaurant = Restaurant::FindorFail($id);

            $album = Album::create([
                'restaurant_id' => $id,
                'name' => $albumName,
                'slug' => $slug,
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
                'service' => $service,
            ];

            return view('restaurants.gallery.index')->with($data);
        }
        if ($service === 'music') {
            $id = $request->get('musician_id');
            $musician = Musician::FindorFail($id);

            $album = Album::create([
                'musician_id' => $id,
                'name' => $albumName,
                'slug' => $slug,
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
                    $file->move(public_path('images/gallery/musicians/' . $musician->name . '/'), $name);
                    $files[] = $name;
                }
            }

            foreach ($files as $file) {
                Picture::create([
                    'album_id' => $album_id,
                    'image' => $file,
                    'musician_id' => $id,
                ]);
            }
            $musician = Musician::FindorFail($id);
            $albums = Album::where('musician_id', $musician->id)->get();
            $pictures = Picture::where('musician_id', $musician->id)->get();

            $data = [
                'musician' => $musician,
                'albums' => $albums,
                'pictures' => $pictures,
                'service' => $service,
            ];

            return view('musicians.gallery')->with($data);
        }
        if ($service === 'photo') {
            $id = $request->get('photographer_id');
            $photographer = Photographer::FindorFail($id);

            $album = Album::create([
                'photographer_id' => $id,
                'name' => $albumName,
                'slug' => $slug,
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
                    $file->move(public_path('images/gallery/photographers/' . $photographer->name . '/'), $name);
                    $files[] = $name;
                }
            }

            foreach ($files as $file) {
                Picture::create([
                    'album_id' => $album_id,
                    'image' => $file,
                    'photographer_id' => $id,
                ]);
            }
            $photographer = Photographer::FindorFail($id);
            $albums = Album::where('photographer_id', $photographer->id)->get();
            $pictures = Picture::where('photographer_id', $photographer->id)->get();

            $data = [
                'photographer' => $photographer,
                'albums' => $albums,
                'pictures' => $pictures,
                'service' => $service,
            ];

            return view('photographers.gallery')->with($data);
        }

    }

    public function destroy(Request $request, $id)
    {

        $album = Album::FindorFail($id);
        $albumRestaurantID = $album->restaurant_id;
        $albumPhotographerID = $album->photographer_id;
        $albumMusicianID = $album->musician_id;
        $album->delete();

        if (isset($albumRestaurantID)) {
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

        if (isset($albumPhotographerID)) {
            $photographer = Photographer::FindorFail($albumPhotographerID);
            $albums = Album::where('photographer_id', $photographer->id)->get();
            $pictures = Picture::where('photographer_id', $photographer->id)->get();

            $data = [
                'photographer' => $photographer,
                'albums' => $albums,
                'pictures' => $pictures,
            ];

            return view('photographers.gallery')->with($data);
        }

        if (isset($albumMusicianID)) {
            $musician = Musician::FindorFail($albumMusicianID);
            $albums = Album::where('musician_id', $musician->id)->get();
            $pictures = Picture::where('musician_id', $musician->id)->get();

            $data = [
                'musician' => $musician,
                'albums' => $albums,
                'pictures' => $pictures,
            ];

            return view('musicians.gallery')->with($data);
        }
    }

    public function gallery(Request $request, $slug)
    {
        $service = $request->get('service');
        if ($service === 'restaurant') {

            $restaurant = Restaurant::where('slug', $slug)->first();
            $albums = Album::where('restaurant_id', $restaurant->id )->get();
            $pictures = Picture::where('restaurant_id', $restaurant->id)->get();

            $data = [
                'restaurant' => $restaurant,
                'albums' => $albums,
                'pictures' => $pictures,
                'service' => $service,
            ];

            return view('users.gallery')->with($data);
        }
        if ($service === 'music') {

            $musician = Musician::where('slug', $slug)->first();
            $albums = Album::where('musician_id', $musician->id )->get();
            $pictures = Picture::where('musician_id', $musician->id)->get();

            $data = [
                'musician' => $musician,
                'albums' => $albums,
                'pictures' => $pictures,
                'service' => $service,
            ];

            return view('users.gallery')->with($data);
        }
        if ($service === 'photo') {

            $photographer = Photographer::where('slug', $slug)->first();
            $albums = Album::where('photographer_id', $photographer->id)->get();
            $pictures = Picture::where('photographer_id', $photographer->id)->get();

            $data = [
                'photographer' => $photographer,
                'albums' => $albums,
                'pictures' => $pictures,
                'service' => $service,
            ];

            return view('users.gallery')->with($data);
        }
    }
}
