<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'image',
        'profile_id',
        'restaurant_id',
        'photographer_id',
        'musician_id',
        'position'
    ];
}
