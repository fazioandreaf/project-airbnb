<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable=[
        'title',
        'rooms',
        'bed',
        'bathroom',
        'area',
        'address',
        'url_img',
        'features',
    ];
    public function landlord(){
            return $this -> belongsTo(Landlord::class);
    }

    public function sponsor(){
            return $this -> belongsTo(Sponsor::class);
    }

    public function statistic() {

        return $this -> hasOne(Statistic::class);
    }

    public function sponsoredapartments() {

        return $this -> hasMany(SponsoredApartment::class);
    }
}
