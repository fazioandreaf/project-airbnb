<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $fillable=[
        'email',
        'password',
        'name',
        'lastname',
        'dob',
        'owners',
    ];
    public function messages(){
            return $this -> hasMany(Message::class);
    }
    public function apartments(){
            return $this -> hasMany(Apartment::class);
    }
}
