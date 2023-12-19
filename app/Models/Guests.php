<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Guests extends Model
{
    protected $table = 'guest';

    protected $fillable = [
        'name',
        'email',
        'link_id',
        'plus_one',
        'confirmed',
        'invitation_id'
    ];

    public function link()
    {
       return $this->belongsTo(Link::class, 'link_id');
    }

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitation_id');
    }
}
