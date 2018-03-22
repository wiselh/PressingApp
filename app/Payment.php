<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $primaryKey = 'id_payment';

    public function commande()
    {
        return $this->belongsTo(Commande::class,'id_commande');
    }
}
