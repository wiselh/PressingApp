<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vetement extends Model
{
    public function categories()
    {
     return $this->belongsTo(Categorie::class);
    }
    /**
     * Get the service record associated with the vetement.
     */
    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
