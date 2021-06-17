<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LandLord;
use Faker\Generator as Faker;

$factory->define(LandLord::class, function (Faker $faker) {
    return [
        'email' => $faker -> safeEmail,
        'password' => $faker -> password,
        'firstname' => $faker -> firstName,
        'lastname' => $faker -> lastName,
        'date_of_birth' => $faker -> date('Y-n-d',$max='now'),
    ];
});
