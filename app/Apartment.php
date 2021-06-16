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
        return $this->belongsTo(Sponsor::class);
    }

    public function landLord()
    {
        return $this->belongsTo(LandLord::class);
    }

    public function statistic() {

        return $this->hasOne(Statistic::class);
    }
}
