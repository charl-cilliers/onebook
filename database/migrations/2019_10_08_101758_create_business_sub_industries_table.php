<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessSubIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_sub_industries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_industry_id')->foreign()->references('id')->on('sub_industry');
            $table->unsignedBigInteger('business_id')->foreign()->references('id')->on('business');
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
        Schema::dropIfExists('business_sub_industries');
    }
}
