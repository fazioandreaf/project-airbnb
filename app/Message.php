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
        'text_message',
    ];

    public function landlord() {

        return $this->belongsTo(LandLord::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
