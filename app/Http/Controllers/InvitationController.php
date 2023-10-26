<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreFemalePhoto;
use App\Http\Controllers\Helpers\ImageStoreGroupPhoto;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Http\Controllers\Helpers\ImageStoreMalePhoto;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function store(Request $request)
    {

        dd($request);

        $validator = Validator::make($request->all(), [
            'mr' => 'required|max:255',
            'mrs' => 'required',
            'date' => 'required',
            'basic-url' => 'required',
            'template' => 'required',
            'male_text' => 'required',
            'female_text' => 'required',
            'main_text' => 'required',
            'male_photo' => 'required',
            'female_photo' => 'required',
            'group_photo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $male_photo = $request['male_photo'];
        $imageObj = new ImageStoreMalePhoto($request, 'invitations');
        $male_photo = $imageObj->imageStore();

        $female_photo = $request['female_photo'];
        $imageObj = new ImageStoreFemalePhoto($request, 'invitations');
        $female_photo = $imageObj->imageStore();

        $group_photo = $request['group_photo'];
        $imageObj = new ImageStoreGroupPhoto($request, 'invitations');
        $group_photo = $imageObj->imageStore();

        $user_id = Auth::user()->id;

        Invitation::create([
            'male_name' => $request->get('mr'),
            'female_name' => $request->get('mrs'),
            'date' => $request->get('date'),
            'male_text' => $request->get('male_text'),
            'female_text' => $request->get('female_text'),
            'main_text' => $request->get('main_text'),
            'template' => $request->get('template'),
            'invitation_link' => $request->get('basic-url'),
            'male_photo' => $male_photo,
            'female_photo' => $female_photo,
            'group_photo' => $group_photo,
            'restaurant_id' => $request->get('restaurant_id'),
            'user_id' => $user_id,
        ]);

        $invitations = Invitation::where('user_id', $user_id)->get();

        $data = [
            'invitations' => $invitations,
        ];
        return view('users.activities')->with($data);
    }

    public function template_a()
    {
        return view('templates.template-A');
    }
}
