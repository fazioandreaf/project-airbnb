<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Landlord;
use App\Sponsor;
class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class,50)->make()->each(function($apartment){
            $landlord=Landlord::inRandomOrder()->first();
            $sponsor=Sponsor::inRandomOrder()->first();

            $apartment->landlord()->associate($landlord);
            $apartment->sponsor()->associate($sponsor);
            $apartment->save();
        });

    }
}
