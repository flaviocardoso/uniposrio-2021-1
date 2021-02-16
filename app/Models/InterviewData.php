<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewData extends Model
{
    protected $fillable = ['collaborator_id', 'period_id', 'start', 'end'];
}
