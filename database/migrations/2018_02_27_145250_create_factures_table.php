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
        DB::statement("CREATE VIEW factures AS
                        SELECT commandes.id_commande, commandes.commande_num,
                             commandes.commande_date, commandes.commande_date_retrait, 
                             commandes.commande_paid, commandes.commande_quantity, commandes.commande_montant,
                             clients.id_client, clients.client_name, clients.client_tele, clients.client_adresse,deleted_at 	
                        FROM commandes,clients 
                        WHERE clients.id_client = commandes.id_client");
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
