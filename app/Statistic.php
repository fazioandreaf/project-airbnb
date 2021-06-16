<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'apartment_id',
        'views',
        'messages',
    ];

    public function apartment() {
        
        return $this-> belongsTo(Apartment::class);
    }
}
