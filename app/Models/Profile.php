<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $table = 'profile';

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'coverImg',
        'logo',
        'phone',
        'description',
        'city_id',
        'user_id',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'weblink',
        'lat',
        'lng',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }


    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'profile_id', 'id');
    }
}
