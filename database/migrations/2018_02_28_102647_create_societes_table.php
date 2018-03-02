<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->increments('societe_id');
            $table->string('societe_name');
            $table->string('societe_adresse');
            $table->string('societe_ville');
            $table->string('societe_tele');
            $table->string('societe_email');
            $table->string('societe_website')->nullable();
            $table->text('societe_logo');
            $table->text('societe_description')->nullable();
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
        Schema::dropIfExists('societes');
    }
}
