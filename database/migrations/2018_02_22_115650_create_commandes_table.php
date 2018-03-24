<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id_commande');
            $table->integer('commande_num');
            $table->dateTime("commande_date");
            $table->dateTime("commande_date_retrait");
            $table->integer("commande_quantity");
            $table->float("commande_montant");
            $table->string("commande_paid");
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
