<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Landlord;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class,50)->make()->each(function($message){
            $landlord=Landlord::inRandomOrder()->first();
            $message->landlord()->associate($landlord);
            $message->save();
        });
    }
}
