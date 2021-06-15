<?php

use Illuminate\Database\Seeder;
// use App\SponsoredSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LandlordSeeder::class,
            MessageSeeder::class,
            SponsorSeeder::class,
            ApartmentSeeder::class,
            StatisticSeeder::class,
            SponsoredApartmentSeeder::class,
        ]
        );
    }
}
