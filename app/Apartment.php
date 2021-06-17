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

    public function landlord()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function services()
    {
        return $this -> belongsToMany(Service::class);
    }

    public function sponsors()
    {
        return $this -> belongsToMany(Sponsor::class);
    }

    public function statistics()
    {
        return $this -> belongsToMany(Statistic::class);
    }

    public function messages()
    {
        return $this -> hasMany(Message::class);
    }
}
