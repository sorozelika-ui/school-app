<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
    protected $table = 'parents';
    protected $fillable = [ 
    'nom_pere',
    'prenom_pere',
    'contact_pere',
    'email_pere',
    'pass_pere',
    'quartier_pere',
    'profession_pere',
    'nom_mere',
    'prenom_mere',
    'contact_mere',
    'email_mere',
    'pass_mere',
    'quartier_mere',
    'profession_mere'
           
    ];
}

