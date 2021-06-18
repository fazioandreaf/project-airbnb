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
            $expire = new DateTime ("now");

            switch ($sponsor->id) {
                case 1:
                    $expire->modify('+24 hours');
                    break;
                case 2:
                    $expire->modify('+48 hours');
                    break;
                case 3:
                    $expire->modify('+144 hours');
                    break;
            }

            // dd($timestamp);

            $apartments = Apartment::inRandomOrder()->limit(2)->get();
            $sponsor->apartments()->attach($apartments, ['start_date' => $start_date, 'expire_date' => $expire]);
            $sponsor->save();
        });
    }
}
