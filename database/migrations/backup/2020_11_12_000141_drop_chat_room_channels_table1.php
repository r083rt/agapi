<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropChatRoomChannelsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chat_room_channels', function (Blueprint $table) {
            $table->dropForeign('chat_room_channels_user_id_foreign');
            $table->dropForeign('chat_room_channels_channel_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_room_channels', function (Blueprint $table) {
            //
        });
    }
}
