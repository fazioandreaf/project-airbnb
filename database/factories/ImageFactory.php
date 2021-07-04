<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Apartment;
use Faker\Generator as Faker;

$nextIndex = nextImage();
$factory->define(Image::class, function (Faker $faker) use ($nextIndex) {
    $i = $nextIndex->current();

    $images = [];
    $apartments = Apartment::all();
    $tot = count($apartments);
    foreach ($apartments as $apartment) {

        $idApartment = $apartment->id;
        for ($j=0; $j < 5 ; $j++) { 

            switch ($j) {
                case 0:
                    $url = asset('storage/app/public/external/'.$idApartment.'.jpg');
                    break;
                    
                case 1:
                    $url = asset('storage/app/public/living-room/'.($idApartment + $tot).'.jpg');
                    break;

                case 2:
                    $url = asset('storage/app/public/kitchen/'.($idApartment + ($tot * 2)).'.jpg');
                    break;
        
                case 3:            
                    $url = asset('storage/app/public/bedroom/'.($idApartment + ($tot * 3)).'.jpg');
                    break;
           
                case 4:
                    $url = asset('storage/app/public/bathroom/'.($idApartment + ($tot * 4)).'.jpg');
                    break;
            }
            $imageNameArr = explode('/',$url);
            $imageName = $imageNameArr[count($imageNameArr)-1];
            $photo = [
                'image' => $imageName,
                'apartment_id' => $idApartment
            ];
            $images []= $photo; 
        } 
    }

    $image = $images[$i];
    $nextIndex->next();
    return [
        'image' => $image['image'],
        'apartment_id' => $image['apartment_id']
    ];
});

function nextImage()
{
    for($i=0; $i<380; $i++) {
        yield $i;
    }
}
