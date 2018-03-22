<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id_categorie';
    protected $dates = ['deleted_at'];


    /**
     * Get the vetements for the Vetement .
     */
    public function vetements()
    {
        return $this->hasMany(Vetement::class,'id_categorie');
    }
}
