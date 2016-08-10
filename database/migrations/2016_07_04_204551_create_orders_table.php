<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('seller_id')->index()->unsigned();
            $table->foreign('seller_id')->references('id')->on('users')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('buyer_id')->index()->unsigned();
            $table->foreign('buyer_id')->references('id')->on('users')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->double('total', 15.2);
            $table->enum('status', [0, 1, 2, 3, 4]);
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
        Schema::drop('orders');
    }
}
