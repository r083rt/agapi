<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_conversations', function (Blueprint $table) {
            $table->boolean('is_admin')->nullable()->after('user_id');
            $table->boolean('is_archived')->nullable()->after('is_admin');
            $table->boolean('is_muted')->nullable()->after('is_archived');
            $table->boolean('is_accepted')->nullable()->after('is_muted');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_conversations', function (Blueprint $table) {
            $table->dropColumn(['is_admin','is_archived','is_muted','is_accepted']);
        });
    }
}
