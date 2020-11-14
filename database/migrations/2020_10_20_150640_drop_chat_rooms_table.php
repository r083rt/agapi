<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropChatRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('main_chat_rooms', function (Blueprint $table) {
            $table->dropForeign('main_chat_rooms_user_id_foreign');
            $table->dropForeign('main_chat_rooms_chat_room_id_foreign');
        });
        Schema::dropIfExists('chat_rooms');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_rooms', function (Blueprint $table) {
            //
        });
    }
}
