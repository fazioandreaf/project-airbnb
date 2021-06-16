<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [

    ];

    public function apartments(Type $var = null)
    {
        return $this->belongsTo(Apartment::class);
    }
}
