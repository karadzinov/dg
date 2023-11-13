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

class MusicianController extends Controller
{
    public function create()
    {
        $cities = City::all();

        $data = [
            'cities' => $cities
        ];
        return view('musicians.create')->with($data);
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
            $imageObj = new ImageStoreLogo($request, 'musicians');
            $logo = $imageObj->imageStore();
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'musicians');
            $coverImg = $imageObj->imageStore();
        }

        $user = Auth::user();

        Musician::create([
            'name' => $name,
            'slug' => $slug,
            'phone' => $phone,
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

        $musician = Musician::where('logo', $logo)->first();
        $contactName = $request->get('contactName');
        $contactPosition = $request->get('contactPosition');
        $contactEmail = $request->get('contactEmail');
        $contactPhone = $request->get('contactPhone');
        $contactDescription = $request->get('desc');
        $count = count($contactName);


        for ($i = 0; $i < $count; $i++) {

            $musician_id = $musician->id;
            Contact::create([
                'contactName' => $contactName[$i],
                'contactPosition' => $contactPosition[$i],
                'contactEmail' => $contactEmail[$i],
                'contactPhone' => $contactPhone[$i],
                'desc' => $contactDescription[$i],
                'musician_id' => $musician_id,
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
        $musician = Musician::FindorFail($id);
        $contacts = Contact::where('musician_id', $id)->get();


        $data = [
            'musician' => $musician,
            'contacts' => $contacts
        ];

        return view('musicians.edit')->with($data);
    }

    public function update(Request $request, $id)
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

        $musician = Musician::FindorFail($id);

        if ($request->hasFile('logo')) {
            $logo = $request['logo'];
            $imageObj = new ImageStoreLogo($request, 'musicians');
            $logo = $imageObj->imageStore();
        }
        if ($request->hasFile('coverImg')) {
            $coverImg = $request['coverImg'];
            $imageObj = new ImageStoreCover($request, 'musicians');
            $coverImg = $imageObj->imageStore();
        }

        $input = $request->all();
        $input['logo'] = $logo;
        $input['coverImg'] = $coverImg;

        $musician->fill($input)->save();

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
        $musician = Musician::FindorFail($id);
        $musician->delete();

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

        $musician = Musician::FindorFail($id);
        $albums = Album::where('musician_id', $musician->id)->get();

        $data = [
            'musician' => $musician,
            'albums' => $albums,
        ];
        return view('musicians.gallery.index')->with($data);
    }

    public function createGallery($id)
    {
        $musician = Musician::FindorFail($id);

        $data = [
            'musician' => $musician,
        ];

        return view('musicians.gallery.create')->with($data);
    }

    public function storeGallery(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'musicians');
        $coverImg = $imageObj->imageStore();
        $musician = Musician::FindorFail($id);

        $album = Album::create([
            'musician_id' => $id,
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
        ];

        return view('musicians.gallery.index')->with($data);
    }

    public function destroyGallery($id)
    {

        $album = Album::FindorFail($id);
        $albumMusicianID = $album->musician_id;
        $album->delete();


        $musician = Musician::FindorFail($albumMusicianID);
        $albums = Album::where('musician_id', $musician->id)->get();
        $pictures = Picture::where('musician_id', $musician->id)->get();

        $data = [
            'musician' => $musician,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('musicians.gallery.index')->with($data);

    }

    public function createVideo($id)
    {
        $musician = Musician::FindorFail($id);

        $data = [
            'musician' => $musician,
        ];

        return view('musicians.gallery.video')->with($data);
    }

    public function storeVideo(Request $request, $id)
    {

        $albumName = $request->get('name');
        $slug = Str::slug($request->get('name'));
        $musician = Musician::FindorFail($id);

        $coverImg = $request['coverImg'];
        $imageObj = new ImageStoreCover($request, 'musicians');
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
            'musician_id' => $id,
            'name' => $albumName,
            'slug' => $slug,
            'coverImg' => $coverImg,
        ]);
        $album_id = $album->id;


        Picture::create([
            'album_id' => $album_id,
            'youtube_link' => $embed_url,
            'musician_id' => $id,
        ]);


        $musician = Musician::FindorFail($id);
        $albums = Album::where('musician_id', $musician->id)->get();
        $pictures = Picture::where('musician_id', $musician->id)->get();

        $data = [
            'musician' => $musician,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('musicians.gallery.index')->with($data);
    }

    public function albumView($id)
    {
        $album = Album::FindorFail($id);
        $musician = Musician::FindorFail($album->musician_id);
        $pictures = Picture::where('album_id', $id)->get();

        $data = [
            'musician' => $musician,
            'album' => $album,
            'pictures' => $pictures,
        ];

        return view('musicians.gallery.album')->with($data);
    }
}
