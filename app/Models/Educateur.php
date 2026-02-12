<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educateur extends Model
{
        protected $fillable = ['nom', 'prenom', 'contact','email','quartier'];
public function classes()
    {
        return $this->belongsToMany(Classe::class, 'clas_an_edu')
                    ->withPivot('annee_id');
    }

    public function proviseurs()
    {
        return $this->hasMany(Proviseur::class);
    }
}
