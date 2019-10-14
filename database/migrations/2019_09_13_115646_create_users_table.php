<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('mobile_number')->unique();
            $table->string('email')->unique();
            $table->string('password', 512);
            $table->boolean('verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verify_token', 512)->nullable();
            $table->boolean('blocked')->default(false);
            $table->string('block_reason')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
