<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve_Parent extends Model
{
    protected $table='eleve_parents';
    protected $fillable=[
        'eleves_id',
        'parent_id'
    ];
}
