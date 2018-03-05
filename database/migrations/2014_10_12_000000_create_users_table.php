<?php

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
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('adresse')->nullable();
            $table->string('email')->unique();
            $table->string('tele');
            $table->string('password');
<<<<<<< HEAD
            $table->text('picture')->nullable();
=======
>>>>>>> 0d4279e290f7da84f242b09682b016d9f6f70347
            $table->string('admin');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
