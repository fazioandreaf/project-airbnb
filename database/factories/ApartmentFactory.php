<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$nextIndex = nextApartment();
$factory->define(Apartment::class, function (Faker $faker) use ($nextIndex) {

    $apartments = [
        [
            'title' => 'Jackie’s Apartments',
            'description' => 'Splendido appartamento finemente arredato con vista panoramica sul mare, 1 camera da letto, 1 soppalco (letto matrimoniale). Soggiorno con camino, TV, cassaforte, cucina, doccia/WC e terrazza privata, WiFi gratuito. Pulizie giornaliere.',
            'number_rooms' => 1,
            'number_toiletes' => 1,
            'number_beds' => 1,
            'area' => 80,
            'address' => 'VIA FILIPPO TURATI 62-64, 00185 ROMA',
            'cover_image' => '',
        ],
        [
            'title' => 'Appartamento in Lucina',
            'description' => "Situato a Roma, a 600 m dalla Fontana di Trevi e a 1,2 km da Piazza di Spagna, l'Appartamento in Lucina offre camere con aria condizionata e bagno privato. La struttura si trova vicino a Largo di Torre Argentina, al Pantheon e a Piazza di Spagna. Avrete a disposizione una cucina in comune e la connessione WiFi gratuita in tutte le aree.",
            'number_rooms' => 2,
            'number_toiletes' => 1,
            'number_beds' => 2,
            'area' => 75,
            'address' => 'Via in Lucina, 10, 00186 Roma RM',
            'cover_image' => '',
        ],
        [
            'title' => 'Light Charme Casa Vacanze',
            'description' => "Light Charme è un appartamento a soli 1 km dal Palazzo del Quirinale. Questo appartamento si trova a 10 minuti a piedi dalla Scalinata di Trinità dei Monti. Il centro di Roma dista 3 km dalla struttura. I diversi ristoranti, tra cui i Sapori D'Ischia e l'Orlando, distano 50 metri dall'appartamento Light Charme. Una breve passeggiata dall'appartamento vi porterà al Museo e alla Cripta dei Frati Cappuccini. L'aeroporto di Roma Ciampino dista 15 km da questo alloggio.",
            'number_rooms' => 2,
            'number_toiletes' => 2,
            'number_beds' => 2,
            'area' => 98,
            'address' => 'Via Sicilia, 50, 00187 Roma RM',
            'cover_image' => '',
        ],
    ];

    $i = $nextIndex->current();
    $apartment = $apartments[$i];
    // dd($apartment);
    $nextIndex->next();

    return [

        'title' => $apartment['title'],
        'description' => $apartment['description'],
        'number_rooms' => $apartment['number_rooms'],
        'number_toiletes' => $apartment['number_toiletes'],
        'number_beds' => $apartment['number_beds'],
        'area' => $apartment['area'],
        'address' => $apartment['address'],
        'cover_image' => $apartment['cover_image'],

        // 'title' => $faker->safeColorName.' of '.$faker->citySuffix,
        // 'number_rooms' => rand(1,3),
        // 'number_toiletes' => rand(1,3),
        // 'number_beds' => rand(1,4),
        // 'area' => rand(15,100),
        // 'address' => $faker->address,
        // 'cover_image' => $faker->imageUrl(800,600, 'city'),
    ];
});

function nextApartment()
{
    for($i=0; $i<3; $i++) {

        yield $i;
    }
}
