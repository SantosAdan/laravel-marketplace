<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                        ->onUpdate('cascade')->onDelete('cascade');

            $table->string('title');
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
        Schema::drop('advertisements');
    }
}
