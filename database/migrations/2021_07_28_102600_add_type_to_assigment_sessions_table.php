<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToAssigmentSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigment_sessions', function (Blueprint $table) {
            $table->enum('type', ['common', 'paid'])->nullable()->default('common')->after('total_score');
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
            $table->dropColumn('type');
        });
    }
}
