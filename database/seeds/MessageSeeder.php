<?php

use Illuminate\Database\Seeder;
Use App\Message;
use App\LandLord;

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
