<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    public $primaryKey = 'id_societe';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'societe_name',
        'societe_adresse',
        'societe_city',
        'societe_tele',
        'societe_email',
        'societe_website',
        'societe_logo',
        'societe_description',
        'societe_cnss',
        'societe_rc',
        'societe_pattent',
        'societe_if',
        'societe_ice',
    ];
    protected $guarded =['id_societe'];

}
