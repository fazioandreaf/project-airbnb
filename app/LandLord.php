<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLord extends Model
{
    protected $fillable = [
        
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
