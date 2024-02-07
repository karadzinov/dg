<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;

    protected $table = 'photographers';

    protected $fillable = [
        'name',
        'slug',
        'coverImg',
        'logo',
        'phone',
        'email',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function  album()
    {
        return $this->hasMany(Album::class);
    }
}
