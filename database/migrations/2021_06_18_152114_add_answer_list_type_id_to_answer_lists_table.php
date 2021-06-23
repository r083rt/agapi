<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerListTypeIdToAnswerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_lists', function (Blueprint $table) {
            $table->foreignId('answer_list_type_id')->nullable()->after('id');

            $table->foreign('answer_list_type_id')->references('id')->on('answer_list_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_lists', function (Blueprint $table) {
            $table->dropForeign('answer_lists_question_list_id_foreign');
            $table->dropColumn('answer_list_type_id');
        });
    }
}
