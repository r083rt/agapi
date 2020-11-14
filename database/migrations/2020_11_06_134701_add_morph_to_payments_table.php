<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddMorphToPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->nullableMorphs('payment');
        });
        DB::update('update payments set payment_type=\'App\\\User\', payment_id=user_id');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //$table->dropIndex(['payment_id']);
            $table->dropMorphs('payment');
        });
        
        //DB::update('update payments set payment_type=null, payment_id=null');

    }
}
