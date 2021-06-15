<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            MessageSeeder::class
            LandlordSeeder::class
            ApartmentSeeder::class
            StatisticSeeder::class
            SponsorSeeder::class
    );
    }
}
