<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leasings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('leasing_value')->nullable(); /* harga nilai kendaraan */
            $table->string('max_value_percent')->nullable()->default(80); /* max percentage pinjaman */
            $table->string('max_value')->nullable(); /* max pinjaman yg didapat -> nilai kendaraan * 80% */
            $table->string('total_loan')->nullable(); /* pinjaman dana yg diajukan */
            $table->string('name')->nullable(); /* nama user */
            $table->string('phone')->nullable(); /* phone user */
            $table->string('email')->unique()->nullable(); /* phone user */
            $table->string('address')->nullable(); /* address user */
            $table->string('npwp')->nullable(); /* NPWP user */
            $table->string('ktp')->nullable(); /* KTP user */
            $table->string('ktp_picture')->nullable(); /* KTP image file user */
            $table->string('selfie_picture')->nullable(); /* Selfie image file user */
            $table->string('bpkb_picture')->nullable(); /* BPKB image file user */
            $table->string('picture1')->nullable(); /* Picture 1 kendaraan */
            $table->string('picture2')->nullable(); /* Picture 2 kendaraan */
            $table->string('picture3')->nullable(); /* Picture 3 kendaraan */
            $table->string('picture4')->nullable(); /* Picture 4 kendaraan */
            $table->string('picture5')->nullable(); /* Picture 5 kendaraan */
            $table->string('picture6')->nullable(); /* Picture 6 kendaraan */
            $table->string('status')->nullable(); /* ? */
            $table->bigInteger('car_brand_id')->unsigned()->nullable();
            $table->bigInteger('car_model_id')->unsigned()->nullable();
            $table->bigInteger('car_type_id')->unsigned()->nullable();
            $table->bigInteger('car_year_id')->unsigned()->nullable();
            $table->bigInteger('car_region_id')->unsigned()->nullable();
            $table->string('tenor')->nullable(); /* tenor masa pinjaman */
            $table->string('assurance')->nullable(); /* assurance */
            $table->string('rate')->nullable(); /* rate */
            $table->string('leasing_code')->nullable(); /* leasing */
            $table->string('admin_fee')->nullable(); /* leasing */
            $table->string('provisi')->nullable(); /* leasing */
            $table->string('polis')->nullable(); /* leasing */
            $table->string('disbursement')->nullable(); /* leasing */
            $table->string('total_ph')->nullable(); /* leasing */
            $table->string('cicilan_perbulan')->nullable(); /* leasing */
            $table->string('ktp_ocr_number')->nullable(); /* leasing */
            $table->string('ktp_ocr_name')->nullable(); /* leasing */
            $table->string('ktp_ocr_dob')->nullable(); /* leasing */
            $table->string('compare_percentage')->nullable(); /* leasing */
            $table->string('is_face_accepted')->nullable(); /* leasing */
            $table->string('is_ocr_changed')->nullable(); /* leasing */
            $table->string('ktp_type')->nullable(); /* leasing */
            $table->string('dob_match')->nullable(); /* leasing */
            $table->string('data_changed')->nullable(); /* leasing */
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('leasings', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_brand_id')->references('id')->on('car_brands')->onDelete('cascade');
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
            $table->foreign('car_year_id')->references('id')->on('car_years')->onDelete('cascade');
            $table->foreign('car_region_id')->references('id')->on('car_regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leasings');
    }
}
