<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = ['eleve_id', 'classe_id', 'annee_id', 'matiere_id', 'professeur_id', 'note', 'periode_id'];

    public function eleve()
    {
        return $this->belongsTo(eleve::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

public function periode()
{
    return $this->belongsTo(Periode::class);
}
}
