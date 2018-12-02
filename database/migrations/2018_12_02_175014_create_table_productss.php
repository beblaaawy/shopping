<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function($table){
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('category_id')->unsigned();
            $table->string('price', 50)->nullable();
            $table->text('avatar');
            $table->integer('quantity')->unsigned();
            $table->string('type', 20);
            $table->string('brand');
            $table->string('currency')->default('egp');
            $table->boolean('in_stock')->default(true);
            $table->boolean('available')->default(true);
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
