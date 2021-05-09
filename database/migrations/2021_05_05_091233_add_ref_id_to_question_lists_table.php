<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefIdToQuestionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_lists', function (Blueprint $table) {
            $table->foreignId('ref_id')->nullable()->constrained('question_lists');

            // $table->foreign('ref_id')->references('id')->on('question_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_lists', function (Blueprint $table) {
            $table->dropForeign('question_lists_ref_id_foreign');
            $table->dropColumn('ref_id');
        });
    }
}
