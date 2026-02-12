<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $fillable = ['nom', 'prenom', 'contact','email','quartier'];
public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'clas_prof');
    }

    public function proviseurs()
    {
        return $this->hasMany(Proviseur::class);
    }
}

