<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToAssigmentSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigment_sessions', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigment_sessions', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
        });
    }
}
