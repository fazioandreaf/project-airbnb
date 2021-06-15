<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SponsoredApartment;
use Faker\Generator as Faker;

$factory->define(SponsoredApartment::class, function (Faker $faker) {
    return [
        'expired_date' => $faker -> date($format = 'Y-m-d', $max = 'now'),
    ];
});
