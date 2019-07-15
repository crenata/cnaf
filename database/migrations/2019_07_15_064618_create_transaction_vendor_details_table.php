<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionVendorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_vendor_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaction_vendor_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->bigInteger('qty');
            $table->string('price');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('transaction_vendor_details', function ($table) {
            $table->foreign('transaction_vendor_id')->references('id')->on('transaction_vendors')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_vendor_details');
    }
}
