<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function factures(){
    	return $this->hasMany(Facture::class);

    }
}
