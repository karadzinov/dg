<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreCover;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Models\Album;
use App\Models\City;
use App\Models\Contact;
use App\Models\Musician;
use App\Models\Photographer;
use App\Models\Picture;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PhotographerController extends Controller
{
    public function create()
    {
        $cities = City::all();

        $data = [
            'cities' => $cities
        ];
        return view('photographers.create')->with($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'coverImg' => 'required',
            'logo' => 'required',
            'phone' => 'required',
            'subtitle' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $phone = $request->get('phone');
        $email = $request->get('email');
        $description = $request->get('description');
        $subtitle = $request->get('subtitle');
        $facebook = $request->get('facebook');
        $instagram = $request->get('instagram');
        $twitter = $request->get('twitter');
        $youtube = $request->get('youtube');
        $weblink = $request->get('weblink');
        $lat = $request->get('lat');
        $lng = $request->get('lng');

        if ($request->hasFile('logo')) {
            $logo = $request['logo'];
            $imageObj = new ImageStoreLogo($request, 'photographers');
            $logo = $imageObj->imageStore();
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'photographers');
            $coverImg = $imageObj->imageStore();
        }

        $user = Auth::user();

        Photographer::create([
            'name' => $name,
            'slug' => $slug,
            'phone' => $phone,
            'email' => $email,
            'description' => $description,
            'subtitle' => $subtitle,
            'coverImg' => $coverImg,
            'logo' => $logo,
            'user_id' => $user->id,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'weblink' => $weblink,
            'lat' => $lat,
            'lng' => $lng,
        ]);

        $photographer = Photographer::where('logo', $logo)->first();
        $contactName = $request->get('contactName');
        $contactPosition = $request->get('contactPosition');
        $contactEmail = $request->get('contactEmail');
        $contactPhone = $request->get('contactPhone');
        $contactDescription = $request->get('desc');
        $count = count($contactName);


        for ($i = 0; $i < $count; $i++) {

            $photographer_id = $photographer->id;
            Contact::create([
                'contactName' => $contactName[$i],
                'contactPosition' => $contactPosition[$i],
                'contactEmail' => $contactEmail[$i],
                'contactPhone' => $contactPhone[$i],
                'desc' => $contactDescription[$i],
                'photographer_id' => $photographer_id,
            ]);

        };

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
        $photographer = Photographer::FindorFail($id);
        $contacts = Contact::where('photographer_id', $id)->get();


        $data = [
            'photographer' => $photographer,
            'contacts' => $contacts
        ];

        return view('photographers.edit')->with($data);
    }

    public function update(Request $request, $id)
    {


        $photographer = Photographer::FindorFail($id);

        $input = $request->all();

        if ($request->hasFile('logo')) {
            $logo = $request['logo'];
            $imageObj = new ImageStoreLogo($request, 'photographers');
            $logo = $imageObj->imageStore();
            $input['logo'] = $logo;
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'photographers');
            $coverImg = $imageObj->imageStore();
            $input['coverImg'] = $coverImg;
        }





        $photographer->fill($input)->save();

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
        $photographer = Photographer::FindorFail($id);
        $photographer->delete();

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

        $photographer = Photographer::FindorFail($id);
        $albums = Album::where('photographer_id', $photographer->id)->get();
        $data = [
            'photographer' => $photographer,
            'albums' => $albums,
        ];
        return view('photographers.gallery.index')->with($data);
    }

    public function createGallery($id)
    {
        $photographer = Photographer::FindorFail($id);

        $data = [
            'photographer' => $photographer,
        ];

        return view('photographers.gallery.create')->with($data);
    }

    public function storeGallery(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $photographer = Photographer::FindorFail($id);
        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'photographers');
        $coverImg = $imageObj->imageStore();

        $album = Album::create([
            'photographer_id' => $id,
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
        ];

        return view('photographers.gallery.index')->with($data);
    }

    public function destroyGallery($id)
    {

        $album = Album::FindorFail($id);
        $albumPhotographerID = $album->photographer_id;
        $album->delete();


        $photographer = Photographer::FindorFail($albumPhotographerID);
        $albums = Album::where('photographer_id', $photographer->id)->get();
        $pictures = Picture::where('photographer_id', $photographer->id)->get();

        $data = [
            'photographer' => $photographer,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('photographers.gallery.index')->with($data);

    }
    public function createVideo($id)
    {
        $photographer = Photographer::FindorFail($id);

        $data = [
            'photographer' => $photographer,
        ];

        return view('photographers.gallery.video')->with($data);
    }

    public function storeVideo(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $photographer = Photographer::FindorFail($id);
        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'photographers');
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
            'photographer_id' => $id,
            'name' => $albumName,
            'slug' => $slug,
            'coverImg' => $coverImg,
        ]);
        $album_id = $album->id;



        Picture::create([
            'album_id' => $album_id,
            'youtube_link' => $embed_url,
            'photographer_id' => $id,
        ]);


        $photographer = Photographer::FindorFail($id);
        $albums = Album::where('photographer_id', $photographer->id)->get();
        $pictures = Picture::where('photographer_id', $photographer->id)->get();

        $data = [
            'photographer' => $photographer,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('photographers.gallery.index')->with($data);
    }

    public function albumView($id)
    {
        $album = Album::FindorFail($id);
        $photographer = Photographer::FindorFail($album->photographer_id);
        $pictures = Picture::where('album_id', $id)->get();

        $data = [
            'photographer' => $photographer,
            'album' => $album,
            'pictures' => $pictures,
        ];

        return view('photographers.gallery.album')->with($data);
    }
}
