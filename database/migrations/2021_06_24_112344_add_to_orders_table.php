<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('checksum')->nullable()->after('payment_gateway');
            $table->string('pay_request_id')->nullable()->after('checksum');
            $table->integer('status')->nullable()->after('pay_request_id')->default(0);
            $table->string('paygate_status')->nullable()->after('status');
            $table->dropColumn('billing_name_on_card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('checksum');
            $table->dropColumn('pay_request_id');
            $table->dropColumn('status');
            $table->dropColumn('paygate_status');
        });
    }
}
