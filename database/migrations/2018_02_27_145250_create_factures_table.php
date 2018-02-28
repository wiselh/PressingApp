<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        SELECT cmd.id_commande, cmd.num_commande , cmd.date_commande, cmd.date_retrait ,
//                cmd.paye_commande , cmd.id_client , v.id_vetement , v.categorie, v.couleur ,
//                 v.type , v.prix , c.nom , c.tel, c.adresse,

//        DB::statement("
//          CREATE VIEW facture AS
//          (
//            SELECT *
//            FROM clients c
//            UNION
//            SELECT *
//            FROM commandes cmd
//            WHERE c.id_client = cmd.id_client
//            UNION
//            SELECT *
//            FROM vetements v
//            WHERE  v.id_commande = cmd.id_commande
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
        DB::statement('DROP VIEW IF EXISTS facture');
    }
}
