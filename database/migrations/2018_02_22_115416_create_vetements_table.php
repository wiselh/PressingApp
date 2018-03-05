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
            $table->string("couleur")->nullable();
            $table->float("prix");
            $table->integer('id_service')->unsigned();
            $table->integer('id_commande')->unsigned();
            $table->integer('id_categorie')->unsigned();
            $table->foreign('id_categorie')->references('id_categorie')->on('categories');
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->foreign('id_commande')->references('id_commande')->on('commandes')->onDelete('cascade');

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
