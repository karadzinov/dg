<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $table = 'restaurants';

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'coverImg',
        'logo',
        'phone',
        'description',
        'address',
        'city_id',
        'capacity',
        'menuDiscount',
        'menuMin',
        'menuMax',
        'user_id',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'weblink',
        'lat',
        'lng'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
