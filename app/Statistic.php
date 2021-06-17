<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'number_views',
        'number_messages',
    ];

    public function apartments()
    {
        return $this -> belongsToMany(Apartment::class);
    }
}
