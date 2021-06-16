<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLord extends Model
{
    protected $table = 'landlords';
    protected $fillable = [
        'email',
        'pas`sword',
        'firstnmae',
        'lastname',
        'date_of_birth',
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function messages() {

        return $this->hasMany(Message::class);
    }
}
