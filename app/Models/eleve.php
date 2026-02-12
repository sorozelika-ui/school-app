<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eleve extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'contact', 'email', 'quartier'];

    // Un élève peut avoir plusieurs notes
    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    // Un élève peut avoir un proviseur
    public function proviseur()
    {
        return $this->hasOne(Proviseur::class);
    }
}
