<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_id')->foreign()->references('id')->on('business');
            $table->unsignedBigInteger('service_id')->foreign()->references('id')->on('services');
            $table->unsignedBigInteger('provider_id')->foreign()->references('id')->on('providers');
            $table->unsignedBigInteger('user_id')->foreign()->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('walkin_id')->foreign()->references('id')->on('walkin')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('appointments');
    }
}
