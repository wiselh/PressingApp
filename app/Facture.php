<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public function vetements(){
    	return $this->hasMany(Vetement::class);
    }
}
