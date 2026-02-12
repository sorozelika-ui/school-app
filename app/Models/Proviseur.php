<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proviseur extends Model
{
    use HasFactory;

    protected $fillable = ['professeur_id', 'eleve_id', 'educateur_id', 'classe_id', 'annee_id','chef_etablissement_id'];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    public function educateur()
    {
        return $this->belongsTo(Educateur::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }
    public function chefetablissement()
    {
        return $this->belongsTo(ChefEtablissement::class);
    }
}

