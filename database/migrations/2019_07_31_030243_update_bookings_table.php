<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //update existing booking table
        Schema::table('bookings', function (Blueprint $table){
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('property_id')->unsigned();
            $table->string('status')->default('Requested');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //update existing booking table
        Schema::table('bookings', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('property_id');
        });
    }
}
