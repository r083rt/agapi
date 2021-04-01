<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('service_code');
            $table->string('account_number');
            $table->timestamps();
        });

        if (!Schema::hasColumn('payments', 'payment_vendor_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->unsignedBigInteger('payment_vendor_id')->nullable();
                $table->foreign('payment_vendor_id')->references('id')->on('payment_vendors')->onDelete('cascade')->onUpdate('cascade');
            });
        }

        if (!Schema::hasColumn('payments', 'master_payment_id')) {
            Schema::table('payments', function (Blueprint $table) {
               $table->unsignedBigInteger('master_payment_id')->nullable()->unique();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('payments', 'payment_vendor_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropForeign(['payment_vendor_id']);
                $table->dropColumn('payment_vendor_id');
            });
        }
        if (Schema::hasColumn('payments', 'master_payment_id')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropColumn('master_payment_id');
            });
        }
        Schema::dropIfExists('payment_vendors');
    }
}
