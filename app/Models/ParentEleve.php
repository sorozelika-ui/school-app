<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentEleve extends Model
{
   use HasFactory;

    protected $table = 'parent_eleve';

    protected $fillable = [
        'parent_id',
        'eleve_id',
    ];
}
