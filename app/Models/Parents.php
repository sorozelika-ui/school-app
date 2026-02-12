<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parents'; // le nom exact de la table

    protected $fillable = [
        'nom_pere',
        'prenom_pere',
        'contact_pere',
        'email_pere',
        'profession◊',
        'quartier_pere',
        'nom_mere',
        'prenom_mere',
        'contact_mere',
        'email_mere',
        'profession_mere',
        'quartier_mere',
    ];

    // Relation many-to-many avec les élèves
    public function eleves()
    {
        return $this->belongsToMany(eleve::class, 'parent_eleve', 'parent_id', 'eleve_id');
    }
}
