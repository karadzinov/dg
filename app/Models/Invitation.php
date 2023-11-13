<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'male_name',
        'female_name',
        'male_text',
        'female_text',
        'main_text',
        'template',
        'invitation_link',
        'male_photo',
        'female_photo',
        'group_photo',
        'date',
        'restaurant_id',
        'user_id',
        'male_quote',
        'female_quote'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
