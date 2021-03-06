<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->index()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->double('price', 15.2);
            $table->integer('quantity');
            $table->string('description');
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
        Schema::drop('products');
    }
}
