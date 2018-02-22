<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vetement extends Model
{
    public function categories()
    {
     return $this->belongsTo(Categorie::class);
    }
}
