<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public $primaryKey = 'id_client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_name','client_tele','client_adresse'];

    public function commandes(){
    	return $this->hasMany(Commande::class,'id_client');
    }
}
