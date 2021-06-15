<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages',function(Blueprint $table){
            $table->foreign('landlord_id','messagelandlord')
                 ->references('id')
                 ->on('landlords');
        });
        Schema::table('apartments',function(Blueprint $table){
            $table->foreign('landlord_id','apartmenproject-airbnbtlandlord')
                 ->references('id')
                 ->on('landlords');
        });
        Schema::table('sponsors',function(Blueprint $table){
            $table->foreign('apartment_id','sponsorapartment')
                 ->references('id')
                 ->on('apartments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function(Blueprint $table){
            $table->dropForeign('messagelandlord');
        });
        Schema::table('apartments', function(Blueprint $table){
            $table->dropForeign('apartmentlandlord');
        });
        Schema::table('sponsors', function(Blueprint $table){
            $table->dropForeign('sponsorapartment');
        });
    }
}
