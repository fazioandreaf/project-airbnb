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

            $start_date = new DateTime ("now");
            // $expire = new DateTime ("today");

            switch ($sponsor->id) {
                case 1:
                    $expire = $timestamp->modify('+24 hours');
                    break;
                case 2:
                    $expire = $timestamp->modify('+48 hours');
                    break;
                case 3:
                    $expire = $timestamp->modify('+144 hours');
                    break;
            }

            // dd($timestamp);

            $apartments = Apartment::inRandomOrder()->limit(2)->get();
            $sponsor->apartments()->attach($apartments, ['start_date' => $start_date, 'expire_date' => $expire]);
            $sponsor->save();
        });
    }
}
