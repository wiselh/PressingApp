<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $primaryKey = 'id_categorie';
    /**
     * Get the vetements for the Vetement .
     */
    public function vetements()
    {
        return $this->hasMany(Vetement::class);
    }
}
