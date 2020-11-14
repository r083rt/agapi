<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimerCodeColumnToAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigments', function (Blueprint $table) {
            //
            $table->string('code')->nullable()->unique();
            $table->string('timer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assigments', function (Blueprint $table) {
            //
            $table->dropColumn('code');
            $table->dropColumn('timer');
        });
    }
}
