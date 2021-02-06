<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodData extends Model
{
    use HasFactory;

    protected $fillable = ['collaborator_id', 'semestre', 'ano', 'registro', 'active'];

    protected $casts = [
        'active' => 'bollean'
    ];
}
