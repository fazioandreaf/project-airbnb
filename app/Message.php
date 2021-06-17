<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email',
        'text_message',
    ];

    public function landlord() {

        return $this->belongsTo(LandLord::class);
    }
}
