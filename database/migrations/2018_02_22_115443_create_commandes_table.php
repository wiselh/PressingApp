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
            $table->increments('id_commande');
            $table->string('num_commande');
            $table->dateTime("date_commande");
            $table->dateTime("date_retrait");
            $table->string("paye_commande");
            $table->integer("quantity");
            $table->float('montant_commande');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('commandes');
    }
}
