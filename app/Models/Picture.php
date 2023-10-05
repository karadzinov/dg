<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';

    protected $fillable = [
        'album_id',
        'restaurant_id',
        'musician_id',
        'photographer_id',
        'image',
        'youtube_link'
    ];


    public function setPicturesAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

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
}
