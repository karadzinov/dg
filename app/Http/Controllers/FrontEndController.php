<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmInvitation;
use App\Mail\MailSender;
use App\Models\Album;
use App\Models\Contact;
use App\Models\Invitation;
use App\Models\Musician;
use App\Models\Photographer;
use App\Models\Picture;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Guests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class FrontEndController extends Controller
{
    public function index()
    {
        $images = \File::allFiles(public_path('images/guests'));

        $photographers = Photographer::all();

        $data = [
            "images" => $images,
            "photographers" => $photographers,
        ];
        return view('main')->with($data);

    }

    public function restaurants()
    {
        $restaurants = Restaurant::orderBy('id', 'desc')->get();

        $data = [
            'restaurants' => $restaurants
        ];

        return view('restaurants.index')->with($data);
    }

    public function musicians()
    {
        $musicians = Musician::orderBy('id', 'desc')->get();

        $data = [
            'musicians' => $musicians
        ];

        return view('musicians.index')->with($data);
    }

    public function photographers()
    {
        $photographers = Photographer::orderBy('id', 'desc')->get();

        $data = [
            'photographers' => $photographers
        ];

        return view('photographers.index')->with($data);
    }

    public function profileRestaurants($slug)
    {

        $restaurant = Restaurant::where('slug', $slug)->first();

        $contacts = Contact::where('restaurant_id', $restaurant->id)->get();
        $albums = Album::where('restaurant_id', $restaurant->id)->get();
        $pictures = Picture::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'contacts' => $contacts,
            'albums' => $albums,
            'pictures' => $pictures,
        ];

        return view('restaurants.profile')->with($data);

    }

    public function profileMusician($slug)
    {

        $musician = Musician::where('slug', $slug)->latest()->first();
        $albums = Album::where('musician_id', $musician->id)->get();
        $contacts = Contact::where('musician_id', $musician->id)->get();

        $pictures = [];
        foreach($albums as $album)
        {
            $pictures[] = Picture::where('album_id', $album->id)->get();
        }



        $data = [
            'musician' => $musician,
            'contacts' => $contacts,
            'pictures' => $pictures
        ];

        return view('musicians.profile')->with($data);

    }

    public function profilePhotographer($slug)
    {

        $photographer = Photographer::where('slug', $slug)->latest()->first();
        $contacts = Contact::where('photographer_id', $photographer->id)->get();
        $albums = Album::where('photographer_id', $photographer->id)->get();

        $data = [
            'photographer' => $photographer,
            'contacts' => $contacts,
            'albums' => $albums
        ];

        return view('photographers.profile')->with($data);

    }

    public function link($invitation, $link)
    {
        $invitation = Invitation::where('invitation_link', '=', $invitation)->first();

        if (!$invitation) {
            return redirect()->route('frontend.index');
        }

        $link = Link::where('link', $link)->first();

        if (!$link) {
            return redirect()->route('frontend.index');
        }
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


        $data = ['str' => $str, 'guests' => $guests, "link" => $link, "invitation" => $invitation];

        if ($invitation->template === 'template_a') {

            return view('invitations.template_a.view')->with($data);
        }

    }

    public function confirm(Request $request)
    {
        $guest = Guests::where('id', '=', $request->get('id'))->first();


        $guest->confirmed = true;
        if ($request->has('email') && $request->get('email') != '') {
            $guest->email = $request->get('email');
            $message = 'Еј фала!';
            Mail::to($guest->email)->send(new ConfirmInvitation($message));
        }
        $guest->menu_option = $request->get('menu_option');
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

    public function contact()
    {
        return view('contact');
    }

    public function question(Request $request)
    {

        $firstName = $request->get('firstName');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $sender = [
            'firstName' => $request->get('firstName'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ];

        $subject = $request->get('subject');
        $email = $request->get('email');
        $msg = $request->get('description');


        Log::info("Добивте прашање од $firstName со емаил: $email, телефон: $phone и наслов $subject. $msg");

        $bccEmails = ["filip@dragigosti.com", "boban@dragigosti.com", "martin@dragigosti.com"];
        Mail::to("contact@dragigosti.com")
            ->bcc($bccEmails)->send(new MailSender($msg, $subject, $sender));
        Session::flash('message', 'Ви благодариме, наскоро ќе добиете повратен одговор');
        return redirect()->back();
    }

    public function invitations()
    {
        $invitations = Invitation::all();
        $restaurants = Restaurant::all();

        $data = [
            'invitations' => $invitations,
            'restaurants' => $restaurants,
        ];

        return view('invitations.index')->with($data);
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function mainContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $sender = [
            'firstName' => $request->get('firstName'),
            'dateTime' => $request->get('dateTime'),
            'email' => 'contact@dragigosti.com',
            'phone' => $request->get('phone')
        ];

        $subject = "Contact from: " . $sender['firstName'];

        $name = $sender['firstName'];

        $dateTime = $sender['dateTime'];

        $phone = $request->get('phone');

        $msg = "Имате порака од $name за да го контактирате во $dateTime на телефон: $phone";

        if($request->get('restaurants'))
        {
            $msg .= " и да го контактирате за рестораните: ;";
            $ids = session()->get('cart', []);
            foreach($ids as $id) {
                $restaurant = Restaurant::where('id', '=', $id['id'])->first();
               $msg .= $restaurant->name . ",\n";
            }

        }

        if($request->get('photographers'))
        {
            $msg .= " и да го контактирате за фотографите: ";
            $ids = session()->get('cart-photo', []);
            foreach($ids as $id) {
                $photographer = Photographer::where('id', '=', $id['id'])->first();
                $msg .= $photographer->name . ",\n";
            }

        }



        Log::info($msg);

        try {
            $bccEmails = ["filip@dragigosti.com", "boban@dragigosti.com", "martin@dragigosti.com"];
            Mail::to("contact@dragigosti.com")
                ->bcc($bccEmails)->send(new MailSender($msg, $subject, $sender));
        } catch (\Exception $e) {
            return response()->json(["errors" => $e->getMessage()], 400);
        }

        return response()->json(["success" => true], 200);

    }

    public function getRestaurant(Request $request)
    {
        $restaurant = Restaurant::FindOrFail($request->get('id'));

        $cart = session()->get('cart', []);

        if(!isset($cart[$restaurant->id])) {
            $cart[$restaurant->id] = $restaurant;
        }  else {
            return response()->json(['success' => true, 200]);
        }

        session()->put('cart', $cart);
        $data = ['restaurant' => $restaurant];
        return view('partials.restaurants')->with($data);
    }

    public  function removeRestaurant(Request $request)
    {
        $restaurant = Restaurant::FindOrFail($request->get('id'));

        $cart = session()->get('cart');
        unset($cart[$restaurant->id]);
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
    }

    public function getPhotographer(Request $request)
    {
        $photographer = Photographer::FindOrFail($request->get('id'));

        $cart = session()->get('cart-photo', []);

        if(!isset($cart[$photographer->id])) {
            $cart[$photographer->id] = $photographer;
        }  else {
            return response()->json(['success' => true, 200]);
        }

        session()->put('cart-photo', $cart);
        $data = ['photographer' => $photographer];
        return view('partials.photographers')->with($data);
    }

    public function getMusician(Request $request)
    {
        $musician = Musician::FindOrFail($request->get('id'));

        $cart = session()->get('cart-musician', []);

        if(!isset($cart[$musician->id])) {
            $cart[$musician->id] = $musician;
        }  else {
            return response()->json(['success' => true, 200]);
        }

        session()->put('cart-musician', $cart);
        $data = ['musician' => $musician];
        return view('partials.musicians')->with($data);
    }

    public function removeMusician(Request $request)
    {
        $musician = Musician::FindOrFail($request->get('id'));

        $cart = session()->get('cart-musician');
        unset($cart[$musician->id]);
        session()->put('cart-musician', $cart);
        session()->flash('success', 'Cart updated successfully');
    }

    public  function removePhotographer(Request $request)
    {
        $photographer = Photographer::FindOrFail($request->get('id'));

        $cart = session()->get('cart-photo');
        unset($cart[$photographer->id]);
        session()->put('cart-photo', $cart);
        session()->flash('success', 'Cart updated successfully');
    }



    public function sitemap()
    {

        $invitations = Invitation::all();
        $restaurants = Restaurant::all();
        $musicians = Musician::all();
        $photographers = Photographer::all();


        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(env('APP_URL'))
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));
        $sitemap->add(Url::create(env('APP_URL') . '/contact')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));
        $sitemap->add(Url::create(env('APP_URL') . '/invitation/create')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach ($invitations as $invitation) {
            $sitemap->add(Url::create(env('APP_URL') . '/' . $invitation->invitation_link)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->add(Url::create(env('APP_URL') . '/restaurants')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach ($restaurants as $restaurant) {
            $sitemap->add(Url::create(env('APP_URL') . '/restaurants/' . $restaurant->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }


        $sitemap->add(Url::create(env('APP_URL') . '/musicians')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach ($musicians as $musician) {
            $sitemap->add(Url::create(env('APP_URL') . '/musicians/' . $musicians->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->add(Url::create(env('APP_URL') . '/photographers')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach ($photographers as $photographer) {
            $sitemap->add(Url::create(env('APP_URL') . '/photographers/' . $photographer->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->writeToFile(public_path() . '/sitemap.xml');

    }
}
