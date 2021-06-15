<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Landlord;
use Faker\Generator as Faker;

$factory->define(Landlord::class, function (Faker $faker) {
    $gender=$faker->randomElement(['male','female']);
    return [
        'email' => $faker ->email,
        'password' => $faker ->word,
        'name' => $faker ->firstName($gender),
        'lastname' => $faker ->lastName,
        'dob' => $faker ->date,
        'owners' => $faker ->boolean,
    ];
});
