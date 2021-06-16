<?php

use Illuminate\Database\Seeder;
use App\LandLord;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LandLord::class, 50) -> create();
    }
}
