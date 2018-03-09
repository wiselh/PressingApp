<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_name','client_tele','client_adresse'];

    public function commandes(){
    	return $this->hasMany(Commande::class);
    }
}
