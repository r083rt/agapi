<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToTopicIndicatorSubjectAssigmentsTable extends Migration
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
            $table->string('topic')->nullable()->change();
            $table->string('subject')->nullable()->change();
            $table->string('indicator')->nullable()->change();
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
            $table->string('topic')->change();
            $table->string('subject')->change();
            $table->string('indicator')->change();
        });
    }
}
