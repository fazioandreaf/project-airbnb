<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'rooms',
        'beds',
        'bathrooms',
        'area',
        'address',
        'img',
        'string',
    ];

    public function sponsor()
    {
        return $this->hasOne(Sponsor::class);
    }

    public function landLord()
    {
        return $this->hasMany(LandLord::class);
    }
}
