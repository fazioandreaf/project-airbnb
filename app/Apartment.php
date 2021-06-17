<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'number_rooms',
        'number_toiletes',
        'number_beds',
        'area',
        'address',
        'latitude',
        'longitude',
        'cover_image',
    ];


}
