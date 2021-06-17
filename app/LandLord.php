<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $table = 'landlords';
    protected $fillable = [
       'email',
       'password',
       'firstname',
       'lastname',
       'date_of_birth',
    ];

    public function apartments()
    {
        return $this -> hasMany(Landlord::class);
    }
}
