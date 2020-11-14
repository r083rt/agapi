<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLessonPlanCoverForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lesson_plans', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('lesson_plan_cover_id')->nullable();
            $table->foreign('lesson_plan_cover_id')->references('id')->on('lesson_plan_covers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesson_plans', function (Blueprint $table) {
            //
            $table->dropForeign(['lesson_plan_cover_id']);
            $table->dropColumn('lesson_plan_cover_id');
        });
    }
}
