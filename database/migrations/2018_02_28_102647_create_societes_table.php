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
            $table->increments('id_societe');
            $table->string('societe_name');
            $table->string('societe_adresse');
            $table->string('societe_ville');
            $table->string('societe_tele');
            $table->string('societe_email');
            $table->string('societe_cnss')->nullable();
            $table->string('societe_rc')->nullable();
            $table->string('societe_pattent')->nullable();
            $table->string('societe_if')->nullable();
            $table->string('societe_ice')->nullable();
            $table->text('societe_logo')->nullable();
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
