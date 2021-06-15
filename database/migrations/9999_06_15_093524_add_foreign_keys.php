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

        Schema::table('statistics', function (Blueprint $table) {

            $table 
                    -> foreign('apartment_id', 'apartment_statistic')
                    -> references('id')
                    -> on('apartments');
        });

        Schema::table('sponsored_apartments', function (Blueprint $table) {

            $table 
                    -> foreign('apartment_id', 'sponsored_apartment')
                    -> references('id')
                    -> on('apartments');

            $table 
                    -> foreign('sponsor_id', 'sponsored_sponsor')
                    -> references('id')
                    -> on('sponsors');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('messages', function(Blueprint $table){
        //     $table->dropForeign('messagelandlord');
        // });
        // Schema::table('apartments', function(Blueprint $table){
        //     $table->dropForeign('apartmentlandlord');
        // });
        // Schema::table('apartments', function(Blueprint $table){
        //     $table->dropForeign('apartmentsponsor');
        // });

        // Schema::table('statistics', function (Blueprint $table) {

        //     $table -> dropForeign('apartment_statistic');
        // });

        // Schema::table('sponsored_apartments', function (Blueprint $table) {

        //     $table -> dropForeign('sponsored_apartment');
        //     $table -> dropForeign('sponsored_sponsor');
        // });

    }
}
