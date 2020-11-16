<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProviderToOauthClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_clients', function (Blueprint $table) {
            // https://github.com/laravel/passport/issues/1264#issuecomment-626745261
            // unpublished migration changed in laravel/passport 9, only add this column if it's missing:
            $hasProviderColumn = \Illuminate\Support\Facades\DB::table('information_schema.columns')
                ->select('column_name')
                ->where('table_name', '=', 'oauth_clients')
                ->where('column_name', '=', 'provider')
                ->exists();

            if (!$hasProviderColumn) {
                Schema::table('oauth_clients', function (Blueprint $table) {
                    // https://github.com/laravel/passport/blob/master/UPGRADE.md#support-for-multiple-guards
                    $table->string('provider')->after('secret')->nullable();
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->dropColumn('provider');

        });
    }
}
