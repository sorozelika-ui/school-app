<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;


// use Illuminate\Database\Eloquent\Model;

class ChefEtablissement extends Model
{
   use HasFactory;

    protected $table = 'chef_etablissement';

    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'email',
        'quartier',
    ];
     public function proviseurs()
    {
        return $this->hasMany(Proviseur::class);
    }

    public function eleves()
    {
        return $this->hasManyThrough(eleve::class, Proviseur::class, 'chef_etablissement_id', 'id', 'id', 'eleve_id');
    }

    public function professeurs()
    {
        return $this->hasManyThrough(Professeur::class, Proviseur::class, 'chef_etablissement_id', 'id', 'id', 'professeur_id');
    }

    public function educateurs()
    {
        return $this->hasManyThrough(Educateur::class, Proviseur::class, 'chef_etablissement_id', 'id', 'id', 'educateur_id');
    }

    public function classes()
    {
        return $this->hasManyThrough(Classe::class, Proviseur::class, 'chef_etablissement_id', 'id', 'id', 'classe_id');
    }

    public function annees()
    {
        return $this->hasManyThrough(Annee::class, Proviseur::class, 'chef_etablissement_id', 'id', 'id', 'annee_id');
    }
}
