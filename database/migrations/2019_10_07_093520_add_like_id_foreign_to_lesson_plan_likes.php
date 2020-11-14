<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLikeIdForeignToLessonPlanLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_plan_likes', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('like_id');
            $table->foreign('like_id')->references('id')->on('likes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_plan_likes', function (Blueprint $table) {
            //
            $table->dropForeign(['like_id']);
            $table->dropColumn('like_id');
        });
    }
}
