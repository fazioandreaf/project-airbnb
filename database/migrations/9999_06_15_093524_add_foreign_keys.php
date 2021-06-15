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
            $table->foreign('landlord_id','apartmentlandlord')
                 ->references('id')
                 ->on('landlords');
        });
        Schema::table('apartments',function(Blueprint $table){
            $table->foreign('sponsor_id','apartmentsponsor')
                 ->references('id')
                 ->on('sponsors');
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
        Schema::table('apartments', function(Blueprint $table){
            $table->dropForeign('apartmentsponsor');
        });
    }
}
