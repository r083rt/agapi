<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributesOnEventsToEventGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_guests', function (Blueprint $table) {
            //
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('start_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_guests', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('address');
            $table->dropColumn('start_at');
        });
    }
}
