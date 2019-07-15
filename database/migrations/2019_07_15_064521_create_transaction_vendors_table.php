<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('total');
            $table->bigInteger('transaction_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('status')->default(1); // 1 = Menunggu Vendor, 2 = Diproses
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('transaction_vendors', function ($table) {
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_vendors');
    }
}
