<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educateur extends Model
{
    protected $table='educateurs';
    protected $file=[
        'nom',
        'prenom',
        'email',
        'pass_educ',
        'contact',
    ];
    public function classes()
{
    return $this->belongsToMany(Classe::class, 'class_annee_educateur', 'educateur_id', 'classe_id')
                ->withPivot('annee_id')
                ->withTimestamps();
}

}
