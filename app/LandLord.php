<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandLord extends Model
{
    protected $table = 'landlords';
    protected $fillable = [
       'email',
       'password',
       'firstname',
       'lastname',
       'date_of_birth',
    ];
}
