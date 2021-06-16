<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Landlord;
use Faker\Generator as Faker;

$factory->define(Landlord::class, function (Faker $faker) {
    $gender=$faker->randomElement(['male','female']);
    return [
        'email' => $faker ->email,
        'password' => $faker ->password                ,
        'name' => $faker ->firstName($gender),
        'lastname' => $faker ->lastName,
        'dob' => $faker ->date('d-m-Y', '01-12-1999'),
        'owners' => $faker ->boolean(50),
    ];
});
