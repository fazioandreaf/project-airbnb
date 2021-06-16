<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        
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
