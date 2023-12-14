<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStoreFemalePhoto;
use App\Http\Controllers\Helpers\ImageStoreGroupPhoto;
use App\Http\Controllers\Helpers\ImageStoreLogo;
use App\Http\Controllers\Helpers\ImageStoreMalePhoto;
use App\Mail\MailSender;
use App\Mail\MailSenderNewInvitation;
use App\Models\Invitation;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class InvitationController extends Controller
{
    public function invitations()
    {
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $invitations = Invitation::where('user_id', $id)
            ->orWhere('email', $email)
            ->paginate(10);

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
            'mr' => 'required',
            'mrs' => 'required',
            'date' => 'required',
            'basic-url' => 'required',
            'template' => 'required',
            'male_photo' => 'required',
            'female_photo' => 'required',
            'group_photo' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $date = now();

        if ($request->has('date') && $request->date) {
            $date = Carbon::parse($request->date)->format('Y-m-d 00:00:00');
        }

        $mrs = $request->get('mrs');
        $mr  = $request->get('mr');

        $male_text = "<p>На секој човек му е потребен животен сопатник, многу љубов и разбирање.</p>
<p>Ако сонцето ја има месечината, денот ја има ноќта, планината го има морето, животот ја има смртта, длабочината ја има висината, галамата ја има тишината, среќата ја има тагата, доброто го има злото - јас ја имам $mrs . Таа е сè што недостасуваше во мојот живот, а заедно сме енергијата, земјата, водата, воздухот и огнот. Ви благодарам што сте дел од нашиот живот.</p>
<p>Дојдете да си поминеме убаво!</p>";

        $male_quote = '<p>Доста време ерген одев, доста лични моми водев, дојде време да се женам, овој живот да го сменам.</p>';

        $female_text = "<p>Како секоја принцеза, така и јас сонував за принцот на бел коњ. Но, за кратко време сфатив дека реалноста е многу поубава од секоја бајка, од секој коњ, од секој сон... Наместо да се плашам од иднината, решив после една година да влезам во една друга реалност која ме научи на мир, среќа и на решителност. Заедно со $mr постигнавме многу за кратко време и едвај чекам да видам што можеме да направиме понатаму. Но, без Вашата поддршка, љубов и грижа, никогаш немаше да бидеме тука.</p>";

        $female_quote = '<p>"We mature in knowledge and wisdom but never leave the playground of our hearts."</p>';

        $main_text = 'Со огромна чест и задоволство Ве покануваме заедно да ја прославиме една од нашите најважни вечери во животот. Од Вас очекуваме да донесете само позитивна енергија и удобни чевли за играње. Се гледаме!';

        $email = $request->get('email');

        if (Auth::user()) {
            $user_id = Auth::user()->id;


            $invitation = Invitation::create([
                'male_name' => $request->get('mr'),
                'female_name' => $request->get('mrs'),
                'date' => $date,
                'template' => $request->get('template'),
                'invitation_link' => $request->get('basic-url'),
                'male_photo' => $request->get('male_photo'),
                'female_photo' => $request->get('female_photo'),
                'group_photo' => $request->get('group_photo'),
                'restaurant_id' => $request->get('restaurant_id'),
                'user_id' => $user_id,
                'email' => $email,
                'male_text' => $male_text,
                'female_text' => $female_text,
                'main_text' => $main_text,
                'male_quote' => $male_quote,
                'female_quote' => $female_quote,
                'hash' => md5($email),
            ]);


            $invitation = Invitation::where('invitation_link', $request->get('basic-url'))->first();
            $restaurants = Restaurant::all();

            $data = [
                'invitation' => $invitation,
                'restaurants' => $restaurants,
            ];

            if ($invitation->template === 'template_a') {
                return view('templates.text-add-templates.template_a')->with($data);
            } else if ($invitation->template === 'template_b') {
                return view('templates.text-add-templates.template_b')->with($data);
            } else {
                return redirect()->route('frontend.index');
            }

        }

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
            'email' => $email,
            'male_text' => $male_text,
            'female_text' => $female_text,
            'main_text' => $main_text,
            'male_quote' => $male_quote,
            'female_quote' => $female_quote,
            'hash' => md5($email),
        ]);


        $invitation = Invitation::where('invitation_link', $request->get('basic-url'))->first();
        $restaurants = Restaurant::all();

        $data = [
            'invitation' => $invitation,
            'restaurants' => $restaurants,
        ];

        if ($invitation->template === 'template_a') {
            return view('templates.text-add-templates.template_a')->with($data);
        } else if ($invitation->template === 'template_b') {
            return view('templates.text-add-templates.template_b')->with($data);
        } else {
            return redirect()->route('frontend.index');
        }
    }

    public function saveRestaurantToInvitations(Request $request, $id)
    {
        $invitation = Invitation::FindorFail($id);

        if ($request->get('restaurant_option') === 'map') {
            $invitation->lat = $request->get('lat');
            $invitation->lng = $request->get('lng');
            $invitation->save();
        }

        if ($request->get('restaurant_option') === 'list') {
            $invitation->restaurant_id = $request->get('restaurant_id');
            $invitation->save();
        }

        $hash = md5($invitation->email);
        $invitation->hash = $hash;
        $invitation->save();

        $subject = 'Креирана Покана';

        Mail::to($invitation->email)->send(new MailSenderNewInvitation($subject, $invitation, $hash));

        return view('invitations.confirm');
    }

    public function show($invitation_link)
    {
        $invitation = Invitation::where('invitation_link', $invitation_link)->first();


        $data = [
            'invitation' => $invitation,
        ];

        if ($invitation->template === 'template_a') {

            return view('invitations.template_a.view')->with($data);
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

        return redirect()->route('frontend.invitations')->with($data);

    }

    public function template_a()
    {

        return view('templates.template-A');
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

    public function checkUrl(Request $request): JsonResponse
    {

        $url = $request->get('content');

        $invitation = Invitation::where('invitation_link', $url)->get();

        $answer = null;

        if (count($invitation) === 0) {
            $answer = 'Valid Url Link';
        } else {
            $answer = 'Choose another Url';
        }

        return response()->json(['status' => $answer]);
    }

    public function editText($id)
    {
        $invitation = Invitation::FindorFail($id);
        $restaurants = Restaurant::all();

        $data = [
            'invitation' => $invitation,
            'restaurants' => $restaurants,
        ];

        if ($invitation->template === 'template_a') {

            return view('invitations.template_a.edit')->with($data);
        }
        dd('so far');
    }

    public function update(Request $request, $id)
    {
        $invitation = Invitation::where('id', $id)->first();

        $male_photo = $request->get('male_photo');
        $female_photo = $request->get('female_photo');
        $group_photo = $request->get('group_photo');

        if (isset($male_photo)) {
            $invitation->male_photo = $request->get('male_photo');
            $invitation->save();
        }
        if (isset($female_photo)) {
            $invitation->female_photo = $request->get('female_photo');
            $invitation->save();
        }

        if (isset($group_photo)) {
            $invitation->group_photo = $request->get('group_photo');
            $invitation->save();
        }

        if ($request->get('restaurant_option') === 'map') {
            $invitation->lat = $request->get('lat');
            $invitation->lng = $request->get('lng');
            $invitation->save();
        }

        if ($request->get('restaurant_option') === 'list') {
            $invitation->restaurant_id = $request->get('restaurant_id');
            $invitation->save();
        }

        $invitation = Invitation::where('id', $id)->first();

        return view('invitations.confirm');
    }

    public function checkHash($invitationUrl, $hash)
    {
        $invitation = Invitation::where('hash', $hash)->first();
        $user = User::where('email', $invitation->email)->first();

        if (!$user) {
            $data = [
                'invitation' => $invitation,
            ];
            return view('auth.registerNew')->with($data);
        } else {
            return redirect()->route('frontend.invitations');
        }

    }
}
