<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'male_name',
        'female_name',
        'male_text',
        'female_text',
        'main_text',
        'template',
        'invitation_link',
        'male_photo',
        'female_photo',
        'group_photo',
        'date',
        'restaurant_id',
        'user_id',
        'male_quote',
        'female_quote',
        'email',
        'lat',
        'lng',
        'hash',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function guests()
    {
        return $this->hasMany(Guests::class)->orderBy('id', 'desc')->get();
    }

    public function guestsCount()
    {
        return $this->hasMany(Guests::class)->count();
    }

    public function guestsConfirmed()
    {
        return $this->hasMany(Guests::class)->where('confirmed', '=', 1)->count();
    }

    public function guestsWaiting()
    {
        return $this->hasMany(Guests::class)->where('confirmed', '=', 0)->count();
    }


    public function countVegans()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'vegan')->count();
    }

    public function countVegetarians()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'vegetarian')->count();
    }

    public function countHalal()
    {
        return  $this->hasMany(Guests::class)->where('menu_option', '=', 'halal')->count();
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
