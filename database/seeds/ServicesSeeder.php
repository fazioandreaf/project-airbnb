<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD:database/seeds/SponsoredApartmentSeeder.php

    factory(SponsoredApartment::class,20)->make()->each(function($sponsored){
                $apartment=Apartment::inRandomOrder()->first();
                $sponsor=Sponsor::inRandomOrder()->first();

                $sponsored->apartment()->associate($apartment);
                $sponsored->sponsor()->associate($sponsor);
                $sponsored->save();
    });
    }}
=======
        //
    }
}
>>>>>>> Fazio:database/seeds/ServicesSeeder.php
