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
        'confirmed'
    ];

    public function link()
    {
       return $this->belongsTo('DragiGosti\Link', 'link_id');
    }
}
