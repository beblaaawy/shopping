<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function($table){
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->text('review');
            $table->integer('rate')->unsigned()->default(5);
            $table->boolean('approved')->default(false);
            $table->integer('product_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('product_reviews', function($table){
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
