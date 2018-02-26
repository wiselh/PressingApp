<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVetementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vetements', function (Blueprint $table) {
            $table->increments('id_vetement');
            $table->string('categorie');
            $table->string("couleur")->nullable();
            $table->float("prix");
            $table->integer('id_service')->unsigned();
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->integer('id_facture')->unsigned();
            $table->foreign('id_facture')->references('id_facture')->on('factures')->onDelete('cascade');
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
        Schema::dropIfExists('vetements');
    }
}
