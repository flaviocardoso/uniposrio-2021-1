<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfoCollaborator extends Model
{
    use HasFactory;

    protected $fillable = ['nacionalidade', 'cpf', 'passaporte', 'instituion', 'departament', 'bond', 'phone'];

    protected $casts = [
        'instituion' => 'array'
    ];

    public function setInstituionAttribute($value)
    {
        $instituion = [];

        if ($value['sigla'] && $value['nome']) {
            $instituion = [
                'sigla' => $value['sigla'],
                'nome' => $value['nome']
            ];
        }

        $this->attributes['instituion'] = json_encode($instituion);
    }
}
