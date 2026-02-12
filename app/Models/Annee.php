<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $fillable = ['libelle'];
    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

    }
