<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $primaryKey = 'id_payment';
    public function commandes()
    {
        return $this->belongsTo(Commande::class);
    }
}
