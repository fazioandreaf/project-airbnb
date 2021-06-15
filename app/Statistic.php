<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'view',
        'rate_message',
        'apartment_id'
    ];

    public function apartment() {

        return $this -> belongsTo(Apartment::class);
    }
}
