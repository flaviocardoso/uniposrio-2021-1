<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class ParticipationInstituion extends Model
{
    public $timestamps = false;

    protected $fillable = ['module', 'instituions'];

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
                    'nome' => $item['nome']
                ];
            }
        }

        $this->attributes['instituions'] = json_encode($instituions);
    }
}
