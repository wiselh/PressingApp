<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateVetementFactureClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        DB::statement("
//          CREATE VIEW vetement_facture_client AS
//          (
//            SELECT f.id_facture, f.num_facture , f.date_facture, f.date_retrait_facture ,
//                f.paye_facture , f.id_client , v.id_vetement , v.categorie, v.couleur ,
//                 v.type , v.prix , c.nom , c.tel, c.adresse
//            FROM `factures` f,vetements v ,clients c
//
//            WHERE v.id_facture = f.id_facture AND f.id_client = c.id_client
//          )
//        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        DB::statement('DROP VIEW IF EXISTS vetement_facture_client');
    }
}
