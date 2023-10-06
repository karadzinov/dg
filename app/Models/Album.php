<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table ='albums';

    protected $fillable = [
        'restaurant_id',
        'musician_id',
        'photographer_id',
        'name',
        'slug',
        'coverImg'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function musician()
    {
        return $this->belongsTo(Musician::class, 'musician_id', 'id');
    }

    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id', 'id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class,'album_id', 'id');
    }
}
