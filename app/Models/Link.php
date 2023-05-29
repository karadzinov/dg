<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = [
        'link',
    ];


    public function guests()
    {
        return $this->hasMany('DragiGosti\Guests', 'link_id');
    }
}
