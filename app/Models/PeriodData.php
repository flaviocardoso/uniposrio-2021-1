<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodData extends Model
{
    protected $fillable = ['collaborator_id', 'semestre', 'ano', 'registro', 'active'];

    protected $casts = [
        'active' => 'bollean'
    ];

    public function setActiveAttribute($value)
    {
        return $this->attributes['active'] = !!$value;
    }

    public function getActiveAttribute()
    {
        return (boolean) $this->attributes['active'];
    }
}
