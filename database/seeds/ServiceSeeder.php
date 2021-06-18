<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Apartment;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class, 5)->create()->each(function ($service) {
            // dd($service);

            $apartments=Apartment::inRandomOrder()->limit(rand(1,5))->get();
            $service->apartments()->attach($apartments);
            $service->save();
        });
    }
}
