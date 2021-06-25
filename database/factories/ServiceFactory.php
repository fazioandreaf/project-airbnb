<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $services=[
        'Wifi',
        'Cucina',
        'TV',
        'Lavatrice',
        'Asciugacapelli',
        'Frigorifero',
        'Condizionatore',
        'Antincendio',
        'Animali',
        'Microonde',
        'Lavatrice',
        'Parcheggio'

    ];
    $index= $faker -> unique() -> numberBetween(0,11);
    $service= $services[$index];

    return [

        'service'=>$service,

    ];
});
