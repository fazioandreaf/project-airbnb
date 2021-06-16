<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsoredApartment extends Model
{
    protected $fillable = [
        'expired_date',
        'apartment_id',
        'sponsor_id'
    ];


    public function apartment() {

        return $this -> belongsTo(Apartment::class);
    }

    public function sponsor() {

        return $this -> belongsTo(Sponsor::class);
    }

}
