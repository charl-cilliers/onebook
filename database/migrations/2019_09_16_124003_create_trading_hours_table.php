<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trading_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_id')->foreign()->references('id')->on('business');
            $table->string('sunday_open');
            $table->string('sunday_close');
            $table->string('monday_open');
            $table->string('monday_close');
            $table->string('tuesday_open');
            $table->string('tuesday_close');
            $table->string('wednesday_open');
            $table->string('wednesday_close');
            $table->string('thursday_open');
            $table->string('thursday_close');
            $table->string('friday_open');
            $table->string('friday_close');
            $table->string('saturday_open');
            $table->string('saturday_close');
            $table->string('holiday_open');
            $table->string('holiday_close');
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
        Schema::dropIfExists('trading_hours');
    }
}
