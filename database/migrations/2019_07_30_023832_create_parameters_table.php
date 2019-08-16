<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->bigIncrements('parameterId');
            $table->string('bedrooms');
            $table->string('garage');
            $table->string('furnished');
            $table->longText('gasMeterLocation');
            $table->longText('electricityMeterLocation');
            $table->longText('waterMeterLocation');
            $table->string('purchaseOrderNumber')->nullable();
            $table->longText('specialInstructions')->nullable();
            $table->longText('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
