<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('hash')->nullable;
            $table->text('file')->nullable();
            $table->dateTime('downloaded_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_downloads');
    }
}
