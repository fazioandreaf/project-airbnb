<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email',
        'sent_date',
        'firstname',
        'lastname',
        'text'
    ];

    public function landlord() {

        return $this->belongsTo(LandLord::class);
    }
}
