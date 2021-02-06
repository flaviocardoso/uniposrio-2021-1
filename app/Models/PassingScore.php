<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassingScore extends Model
{
    use HasFactory;

    protected $fillable = ['period_id', 'collaborator_id', 'module', 'instituions'];

    protected $casts = [
        'instituions' => 'array'
    ];

    public function setInstituionsAttribute($value)
    {
        $instituions = [];

        foreach ($value as $item) {
            if ($item['sigla'] && $item['nome']) {
                $instituions[] = [
                    'sigla' => $item['sigla'],
                    'nome' => $item['nome'],
                    'nota' => $item['nota']
                ];
            }
        }

        $this->attributes['instituions'] = json_encode($instituions);
    }
}
