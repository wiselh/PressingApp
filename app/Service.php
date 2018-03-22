<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    public $primaryKey = 'id_service';
    protected $dates = ['deleted_at'];


    /**
     * Get the vetements for the Vetement .
     */
    public function vetements()
    {
        return $this->hasMany(Vetement::class,'id_service');
    }
}
