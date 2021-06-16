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
        Schema::table('messages', function (Blueprint $table) {

            $table
                    ->foreign('landlord_id', 'message_landlord')
                    ->references('id')
                    ->on('landlords');
        });

        Schema::table('apartments', function (Blueprint $table) {

            $table
                    ->foreign('landlord_id', 'apartment_landlord')
                    ->references('id')
                    ->on('landlords');
        });

        Schema::table('sponsors', function (Blueprint $table) {

            $table
                    ->foreign('apartment_id', 'sponsor_apartment')
                    ->references('id')
                    ->on('apartments');
        });

        Schema::table('statistics', function (Blueprint $table) {

            $table
                    ->foreign('apartment_id', 'statistic_apartment')
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
        Schema::table('messages', function (Blueprint $table) {

            $table->dropForeign('message_landlord');
        });

        Schema::table('apartments', function (Blueprint $table) {

            $table->dropForeign('apartment_landlord');
        });

        Schema::table('sponsors', function (Blueprint $table) {

            $table->dropForeign('sponsor_apartment');
        });

        Schema::table('statistics', function (Blueprint $table) {

            $table->dropForeign('statistic_apartment');
        });
    }
}
