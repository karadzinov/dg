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
        'user_id'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'restaurant_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'city_id');
    }
}
