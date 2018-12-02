<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address', 200)->nullable();
            $table->string('role', 20)->default('user');
            $table->string('gender', 10)->default('male');
            $table->string('phone', 30)->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        User::insert([
            'first_name' => 'sarah',
            'last_name' => 'tarek',
            'email' => 'sarah.tarek@gmail.com',
            'password' => '123456',
            'gender' => 'female',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
