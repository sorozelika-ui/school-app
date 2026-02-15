<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
  protected $table='eleves';
  protected $fillable=[
    'matricule',
    'nom',
    'prenom',
    'email',
    'contact',
    'quartier',
    'classe_id',
    'date_naissance',
  ];
  public function classe()
{
    return $this->belongsTo(\App\Models\Classe::class);
}

}
