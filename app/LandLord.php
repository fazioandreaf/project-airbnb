<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLord extends Model
{
    protected $fillable = [
        'email',
        'pas`sword',
        'firstnmae',
        'lastname',
        'date_of_birth',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
