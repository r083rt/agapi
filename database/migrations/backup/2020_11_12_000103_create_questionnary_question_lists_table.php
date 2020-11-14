<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaryQuestionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnary_question_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('questionnary_id');
            $table->unsignedBigInteger('question_list_id');
            $table->timestamps();

            $table->foreign('questionnary_id')->references('id')->on('questionnaries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('question_list_id')->references('id')->on('question_lists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnary_question_lists');
    }
}
