<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstituion extends Model
{
    use HasFactory;

    protected $fillable = ['sigla', 'nome'];
}
