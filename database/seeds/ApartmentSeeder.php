<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\LandLord;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 50)->make()->each(function ($apartment) {
                $landlord = LandLord::inRandomOrder()->first();
                $apartment->landlord()->associate($landlord);
                $apartment->save();
        });
    }
}
