<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //update the properties table
        //update existing booking table
        Schema::table('parameters', function (Blueprint $table){
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('propertyId')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('parameters', function (Blueprint $table){
            $table->dropForeign('property_id');
        });
    }
}
