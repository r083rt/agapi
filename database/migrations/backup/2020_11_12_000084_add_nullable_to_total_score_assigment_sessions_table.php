<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToTotalScoreAssigmentSessionsTable extends Migration
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
            $table->bigInteger('total_score')->nullable()->change();
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
            $table->bigInteger('total_score')->default(0)->change();
        });
    }
}
