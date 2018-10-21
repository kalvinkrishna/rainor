<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_transaction')->index();
            $table->unsignedInteger('id_product')->index();

            $table->foreign('id_transaction')->references('id')->on('order');
            $table->foreign('id_product')->references('id')->on('product');

            $table->date('order_time');

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
        Schema::dropIfExists('transactionproduct');
    }
}
