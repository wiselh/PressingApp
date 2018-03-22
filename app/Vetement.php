<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vetement extends Model
{
    use SoftDeletes;
    protected $table = 'vetements';
    public $primaryKey = 'id_vetement';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $with = ['client'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class,'id_commande','id_commande');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
