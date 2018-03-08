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
