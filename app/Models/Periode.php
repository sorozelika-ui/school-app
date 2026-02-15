<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $stable='periodes';
    protected $file=['libelle','debut','fin'];
 
   public function annee()
{
    return $this->belongsTo(Annee::class);
}

}
