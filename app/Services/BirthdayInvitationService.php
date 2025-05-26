<?php

namespace App\Services;

use App\Mail\MailSenderNewInvitation;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BirthdayInvitationService
{
    public function getAll()
    {
        return Invitation::all();
    }

    public function create(array $data)
    {
        $user = auth()->user() ? auth()->user() : User::where("email", "=", $data['email'])->first();

        if ($user) {
            $invitation = Invitation::create([
                'name' => $data['name'],
                'years' => $data['years'],
                'date' => $data['date'],
                'template' => 'birthday',
                'invitation_link' =>   Invitation::generateUniqueInvitationLink($data['name']),
                'group_photo' => $data['group_photo'],
                'email' => $user->email,
                'main_text' => $data['main_text'],
                'user_id' => $user->id,
            ]);
        } else {
            $hash = md5($data['email']);

            $user = User::create(
                [
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make(rand(100, 2000)),
                    'category' => 'invitations'
                ]
            );
            $invitation = Invitation::create([
                'name' => $data['name'],
                'years' => $data['years'],
                'date' => $data['date'],
                'template' => 'birthday',
                'invitation_link' =>  Invitation::generateUniqueInvitationLink($data['name']),
                'group_photo' => $data['group_photo'],
                'email' => $user->email,
                'main_text' => $data['main_text'],
                'user_id' => $user->id,
                'hash' => $hash,
            ]);

            $subject = 'Креирана Покана';

            Mail::to($invitation->email)->send(new MailSenderNewInvitation($subject, $invitation, $hash));
        }

        $data = ['invitation' =>  $invitation];
        return response()->json($data, 200);
    }

    public function getById($id)
    {
        return Invitation::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $resource = Invitation::findOrFail($id);
        $resource->update($data);
        return $resource;
    }

    public function delete($id)
    {
        Invitation::findOrFail($id)->delete();
    }
}
