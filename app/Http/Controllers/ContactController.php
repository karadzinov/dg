<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->latest()->first();

        $contacts = Contact::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'contacts' => $contacts
        ];
        return view('contacts.index')->with($data);
    }

    public function create($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->latest()->first();

        $data = [
            'restaurant' => $restaurant,
        ];
        return view('contacts.create')->with($data);
    }

    public function store(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'contactName' => 'required|max:255',
            'contactPosition' => 'required',
            'contactEmail' => 'required',
            'contactPhone' => 'required',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contactName = $request->get('contactName');
        $contactPosition = $request->get('contactPosition');
        $contactEmail = $request->get('contactEmail');
        $contactPhone = $request->get('contactPhone');
        $contactDescription = $request->get('desc');
        $restaurant_id = $request->get('restaurant_id');

        Contact::create([
            'contactName' => $contactName,
            'contactPosition' => $contactPosition,
            'contactEmail' => $contactEmail,
            'contactPhone' => $contactPhone,
            'desc' => $contactDescription,
            'restaurant_id' => $restaurant_id,
        ]);

        $restaurant = Restaurant::FindorFail($restaurant_id);

        $contacts = Contact::where('restaurant_id', $restaurant->id)->get();

        $data = [
            'restaurant' => $restaurant,
            'contacts' => $contacts
        ];
        return view('contacts.index')->with($data);
    }

    public function edit($id)
    {
        $contact = Contact::FindorFail($id);

        $data = [
            'contact' => $contact
        ];
        return view('contacts.edit')->with($data);
    }

    public function update(Request $request , $id)
    {
        $contact = Contact::FindorFail($id);

        $input = $request->all();
        $contact->fill($input)->save();

        $restaurant = Restaurant::FindorFail($contact->restaurant_id);

        $contacts = Contact::where('restaurant_id', $contact->restaurant_id)->get();

        $data = [
            'restaurant' => $restaurant,
            'contacts' => $contacts
        ];
        return view('contacts.index')->with($data);
    }

    public function destroy($id)
    {

        $contact = Contact::FindorFail($id);
        $tempId = $contact->restaurant_id;
        $contact->delete();


        $contacts = Contact::where('restaurant_id', $tempId);

        $restaurants = Restaurant::where('user_id', $tempId)->get();

        $data = [
            'restaurants' => $restaurants,
            'contacts' => $contacts
        ];
        return view('users.index')->with($data);
    }
}
