<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefIdToAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assigments', function (Blueprint $table) {
            $table->foreignId('ref_id')->nullable(); //->constrained('assigments');
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
            // $table->dropForeign('assigments_ref_id_foreign');
            $table->dropColumn(['ref_id']);
        });
    }
}
