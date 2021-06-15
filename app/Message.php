<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
        'email',
        'date_sent',
        'name',
        'lastname',
        'text_message',
    ];
    public function landlord(){
            return $this -> belongsTo(Landlord::class);
    }

}
