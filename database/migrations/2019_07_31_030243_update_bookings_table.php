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
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('clerk_id')->nullable();
            $table->unsignedBigInteger('file_id')->nullable();

            $table->foreign('client_id')->references('clientId')->on('clients');
            $table->foreign('property_id')->references('propertyId')->on('properties');
            $table->foreign('clerk_id')->references('clerkId')->on('clerks');
            $table->foreign('file_id')->references('fileId')->on('files');
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
            $table->dropForeign('client_id');
            $table->dropForeign('property_id');
            $table->dropForeign('clerk_id');
            $table->dropForeign('file_id');
        });
    }
}
