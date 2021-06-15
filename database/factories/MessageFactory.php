<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $gender=$faker->randomElement(['male','female']);
    return [
        'email'=> $faker ->word,
        'date_sent'=> $faker ->date,
        'name'=> $faker ->firstName($gender),
        'lastname'=> $faker ->lastName,
        'text_message'=> $faker ->word,
    ];
});
