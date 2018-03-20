<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vetement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
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
