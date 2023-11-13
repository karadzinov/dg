<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'city',
        'lat',
        'lng',
        'country',
        'iso2',
        'admin_name',
        'capital',
        'population',
        'population_proper'
    ];


}
