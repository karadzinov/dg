<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'contactName',
        'contactPosition',
        'contactEmail',
        'contactPhone',
        'desc',
        'restaurant_id',
        'musician_id',
        'photographer_id',
        'profile_id'
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

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
}
