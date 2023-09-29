<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;

    protected $table = 'musicians';

    protected $fillable = [
        'name',
        'slug',
        'coverImg',
        'logo',
        'phone',
        'description',
        'user_id',
        'subtitle',
        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'weblink',
        'lat',
        'lng'
    ];
}
