<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facture extends Model
{
//    protected $table = 'factures';
    public $primaryKey = 'id_commande';
}
