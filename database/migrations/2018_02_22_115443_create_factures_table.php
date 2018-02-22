<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id_facture');
            $table->string('num_factue');
            $table->timestamp("date_facture");
            $table->timestamp("date_retrait_facture");
            $table->string("paye_facture");
            $table->float("montant_facture");
            $table->integer("qte_facture");
            $table->integer('id_client')->unsigned();
            $table->integer('id_vetement')->unsigned();

            $table->foreign('id_client')->references('id_client')->on('clients');
            $table->foreign('id_vetement')->references('id_vetement')->on('vetements');
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
        Schema::dropIfExists('factures');
    }
}
