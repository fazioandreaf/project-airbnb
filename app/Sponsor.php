<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'apartment_id',
        'price',
        'time_lapse',
    ];

    public function apartments(Type $var = null)
    {
        return $this->belongsTo(Apartment::class);
    }
}
