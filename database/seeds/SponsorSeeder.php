<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use App\Apartment;
class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsor::class,20) ->make()
            ->each(function($sponsor){

                $apartment = Apartment::inRandomOrder()->first();
                $sponsor -> apartment_id = $apartment->id;
                $sponsor->save();
         });
    }
}
