<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the comments for the blog post.
     */
    public function vetements()
    {
        return $this->hasMany(Vetement::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
