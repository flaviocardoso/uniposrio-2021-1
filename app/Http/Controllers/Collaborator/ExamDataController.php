<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamDataController extends Controller
{
    public function showCreateNewExamConfig()
    {
        $period = ['semestre' => 1, 'ano' => 2021];
        $registration = [];
        $exam = [];
        $interview = [];
        $passingscore = [];

        return view('docente.exam.create-exam-setting', 
            [
                'period' => $period,
                'registration' => $registration,
                'exam' => $exam,
                'interview' => $interview,
                'passingscore' => $passingscore
            ]
        );
    }

    public function showExamConfig()
    {
        $period = [];
        $registration = [];
        $exam = [];
        $interview = [];
        $passingscore = [];

        return view('docente.exam.edit-exam-setting', 
            [
                'period' => $period,
                'registration' => $registration,
                'exam' => $exam,
                'interview' => $interview,
                'passingscore' => $passingscore
            ]
        );
    }
    // periodo configuração de exam
    public function storePeriodExamConfig()
    {
        return view('');
    }

    public function updatePeriodExamConfig()
    {
        return view('');
    }
    // inscrição configuração de exam
    public function storeRegistrationExamConfig()
    {
        return view('');
    }

    public function updateRegistrationExamConfig()
    {
        return view('');
    }
    // prova configuração de exam
    public function storeExamConfig()
    {
        return view('');
    }

    public function updateExamConfig()
    {
        return view('');
    }
    // entrevista configuração de exam
    public function storeInterviewExamConfig()
    {
        return view('');
    }

    public function updateInterviewExamConfig()
    {
        return view('');
    }
    // porte de corte configuração de exam
    public function storePassingStoreExamConfig()
    {
        return view('');
    }

    public function updatePassingStoreExamConfig()
    {
        return view('');
    }
}
