<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamData extends Model
{
    protected $fillable = [
        'collaborator_id', 
        'period_id', 
        'date_exam', 
        'time_start_exam', 
        'duration_exam', 
        'num_questions_exam',
        'time_start_download_exam',
        'time_end_download_exam',
        'date_solicitation_exam',
        'date_result_exam',
        'date_review',
        'time_review'
    ];
}
