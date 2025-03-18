<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'category'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class, 'user_id');
    }


    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'user_id', 'id');
    }



    public function packageInfo()
    {


        $countInvitations = $this->invitations()->count();

        $guestCount = 0;

        foreach($this->invitations()->get() as $invitation)
        {
            $guestCount += $invitation->guestsCount();
        }

        return ['totalGuests' => $guestCount, 'totalInvitations' => $countInvitations];

    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
