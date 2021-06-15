<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable=[
        'expired_date',
        'price',
    ];

    public function apartments(){
            return $this -> hasMany(Apartment::class);
    }

    public function sponsoredapartments() {

        return $this -> hasMany(SponsoredApartment::class);
    }

}
