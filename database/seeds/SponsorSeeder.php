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

        factory(Sponsor::class,3)->create()->each(function ($sponsor) {

            $timestamp = new DateTime ("today");
            $expire = new DateTime ("today");

            switch ($sponsor->id) {
                case 1:
                    $expire->modify('+1 day');
                    break;
                case 2:
                    $expire->modify('+3 day');
                    break;
                case 3:
                    $expire->modify('+7 day');
                    break;
            }

            // dd($timestamp);

            $apartments = Apartment::inRandomOrder()->limit(2)->get();
            $sponsor->apartments()->attach($apartments, ['start_date' => $timestamp, 'expire_date' => $expire]);
            $sponsor->save();
        });
    }
}
