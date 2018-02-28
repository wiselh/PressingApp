<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function vetements(){
    	return $this->hasMany(Vetement::class);
    }
}
