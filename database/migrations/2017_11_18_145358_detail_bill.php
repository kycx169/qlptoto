<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetailBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bill');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_bill');
    }
}
