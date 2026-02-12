<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function eleves()
    {
        return $this->hasMany(eleve::class);
    }

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class, 'clas_prof');
    }

    public function educateurs()
    {
        return $this->belongsToMany(Educateur::class, 'clas_an_edu')
                    ->withPivot('annee_id');
    }
}
