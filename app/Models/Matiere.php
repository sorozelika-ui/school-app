<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
       protected $fillable = ['nom'];

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }

}
