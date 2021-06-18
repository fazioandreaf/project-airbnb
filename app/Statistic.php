<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'ip',
        'view_date'
    ];

    public function apartment()
    {
        return $this -> belongsTo(Apartment::class);
    }
}
