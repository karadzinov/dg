<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreFemalePhoto;
use App\Http\Controllers\Helpers\ImageStoreGroupPhoto;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Http\Controllers\Helpers\ImageStoreMalePhoto;
use App\Models\Invitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function invitations()
    {
        $id = Auth::user()->id;
        $invitations = Invitation::where('user_id', $id)->get();

        $data = [
            'invitations' => $invitations,
        ];
        return view('invitations.index')->with($data);
    }

    public function create()
    {
        return view('invitations.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mr' => 'required|max:255',
            'mrs' => 'required',
            'date' => 'required',
            'basic-url' => 'required',
            'template' => 'required',
            'male_photo' => 'required',
            'female_photo' => 'required',
            'group_photo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user_id = Auth::user()->id;

        $invitation = Invitation::create([
            'male_name' => $request->get('mr'),
            'female_name' => $request->get('mrs'),
            'date' => $request->get('date'),
            'template' => $request->get('template'),
            'invitation_link' => $request->get('basic-url'),
            'male_photo' => $request->get('male_photo'),
            'female_photo' => $request->get('female_photo'),
            'group_photo' => $request->get('group_photo'),
            'restaurant_id' => $request->get('restaurant_id'),
            'user_id' => $user_id,
        ]);

        $invitations = Invitation::where('user_id', $user_id)->get();

        $data = [
            'invitations' => $invitations,
        ];

        return view('invitations.index')->with($data);
    }

    public function show($id)
    {
        $invitation = Invitation::FindorFail($id);

        $data = [
            'invitation' => $invitation
        ];

        if ($invitation->template === 'template_a') {
            return view('templates.text-add-templates.template_a')->with($data);
        }
        dd('so far');
    }

    public function destroy($id)
    {
        $user_id = Auth::user()->id;

        $invitation = Invitation::FindorFail($id);

        $invitation->delete();

        $invitations = Invitation::where('user_id', $user_id)->get();

        $data = [
            'invitations' => $invitations,
        ];

        return view('invitations.index')->with($data);

    }

    public function template_a()
    {

        return view('templates.template-A');
    }

    public function editText($id)
    {

        $invitation = Invitation::FindorFail($id);


        $invitationDate = $invitation->date;

        $date = Carbon::setLocale('mk')->$invitationDate->format('l j F Y H:i:s');
        dd($date);
        $data = [
            'invitation' => $invitation,
        ];

        return view("templates.text-add-templates.$invitation->template")->with($data);

    }

    public function textStore(Request $request): JsonResponse
    {

        $id = $request->get('invitation_id');
        $updateOn = $request->get('content_id');
        $updateText = $request->get('content');

        $invitation = Invitation::FindorFail($id);

        $objectChanged = null;

        if ($updateOn === 'male_text') {
            $invitation->male_text = $updateText;
            $invitation->save();

            $objectChanged = 'male_text';
        }

        if ($updateOn === 'female_text') {
            $invitation->female_text = $updateText;
            $invitation->save();

            $objectChanged = 'female_text';
        }

        if ($updateOn === 'main_text') {
            $invitation->main_text = $updateText;
            $invitation->save();

            $objectChanged = 'main_text';
        }

        if ($updateOn === 'male_quote') {
            $invitation->male_quote = $updateText;
            $invitation->save();

            $objectChanged = 'male_quote';
        }
        if ($updateOn === 'female_quote') {
            $invitation->female_quote = $updateText;
            $invitation->save();

            $objectChanged = 'female_quote';
        }


        return response()->json(['success' => $objectChanged]);
    }


}
