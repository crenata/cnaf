<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuranceRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assurance_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('car_region_id');
            $table->bigInteger('assurance_type_id');
            $table->string('category');
            $table->string('rate');
            $table->string('rate12');
            $table->string('rate24');
            $table->string('rate36');
            $table->string('rate48');
            $table->string('rate60');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assurance_rates');
    }
}
