<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePropertiesTable extends Migration
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
        Schema::table('properties', function (Blueprint $table){
            $table->integer('parameter_id')->unsigned();
            $table->foreign('parameter_id')->references('id')->on('parameters');
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
            $table->dropForeign('parameter_id')->references('id')->on('parameters');
        });
    }
}
