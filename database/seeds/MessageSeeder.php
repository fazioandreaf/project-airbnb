<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class, 20) -> make()
            -> each(function ($message) {

                $landlord = LandLord::inRandomOrder()->first();
                $message->landlord()->associate($landlord);
                $message->save();
            });
    }
}
