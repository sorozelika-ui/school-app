<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodes extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'annee_id'];

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }
}

