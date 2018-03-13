<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $primaryKey = 'id_service';

    /**
     * Get the vetements for the Vetement .
     */
    public function vetements()
    {
        return $this->hasMany(Vetement::class);
    }
}
