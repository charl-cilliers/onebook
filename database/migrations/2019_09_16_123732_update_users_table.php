<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('mobile_number')->after('name')->unique();
            $table->boolean('blocked')->after('password');
            $table->string('block_reason')->after('blocked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('mobile_number');
            $table->dropColumn('blocked');
            $table->dropColumn('blocked_reason');
        });
    }
}
