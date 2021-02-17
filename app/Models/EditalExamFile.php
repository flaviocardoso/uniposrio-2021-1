<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditalExamFile extends Model
{
    use HasFactory;

    protected $fillable = ['period_id', 'collaborator_id', 'file_config'];

    protected $casts = [
        'file_config' => 'array'
    ];

    public function setFile_configAttribute ($value)
    {
        $file_config = [];

        foreach ($value as $item) {
            if ($item['file'] && $item['lang']) {
                $file_config[] = [
                    'file' => $item['file'],
                    'lang' => $item['lang']
                ];
            }
        }

        $this->attributes['file_config'] = json_encode($file_config);
    }
}
