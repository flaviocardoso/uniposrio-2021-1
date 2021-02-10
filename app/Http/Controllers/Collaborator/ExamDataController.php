<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\PeriodData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

class ExamDataController extends Controller
{
    public function createNewPeriodExamConfig(Request $request)
    {
        return view('docente.exam.create-period-exam-setting', 
            [
                'examperiodconfig' => $request->session()->get('examperiodconfig'),
                'errorperiod' => $request->session()->get('errorperiod')
            ]);
    }

    public function postNewPeriodExamConfig(Request $request)
    {
        $period = $request->only('ano', 'semestre', 'active', 'registro');

        Validator::make($period,
        [
            'ano' => ['required', 'integer', 'min:2010', 'max:2100', 'unique:period_data'],
            'semestre' => ['required', 'between:1,2.9', 'unique:period_data'],
            'registro' => ['required', 'string'],
            'active' => ['required', 'in:1,0']
        ], [
            'ano.required' => 'O ano precisa ser inserido',
            'ano.integer' => 'O ano precisa ser inteiro',
            'ano.min' => 'O ano tem que ser maior ou igual a 2010',
            'ano.max' => 'O ano tem que ser menor ou igual a 2100',
            'ano.unique' => 'Já existe ano e semestre no sistema',
            'semestre.required' => 'O semestre precisa ser inserido',
            'semestre.between' => 'O semestre precisa ser 1 a 2.9',
            'semestre.unique' => 'Já existe ano e semestre no sistema',
            'active.required' => 'A situação precisa ser inserido'
        ])->validate();


        $periodUnique = PeriodData::where([
            'ano', '=', $period['ano'],
            'semestre', '=', $period['semestre']
        ])->get();

        if ($periodUnique->count() > 0) {
            $request->session()->flash('errorperiod', 'Já existe este periodo no sistema');

            return $request->wantsJson()
                ? new JsonResource(['message' => trans('')], 201) 
                : back();
        }

        if (empty($request->session()->get('examperiodconfig'))) {
            $periodConfig = new PeriodData();
            echo 'vazio<br>';
        } else {
            $periodConfig = $request->session()->get('examperiodconfig');
        }

        $periodConfig->fill($period);
        $request->session()->put('examperiodconfig', $periodConfig);

        return redirect()->route('collaborator.dashboard.new.exam.registration');
    }

    public function createNewRegistrationExamConfig(Request $request)
    {
        return view('docente.exam.registration-date-exam-setting', ['examperiodconfig' => $request->session()->get('examperiodconfig')]);
    }

    public function postNewRegistrationExamConfig(Request $request)
    {
        #
    }

    public function createNewExamExamConfig(Request $request)
    {
        #
    }

    public function postNewExamExamConfig(Request $request)
    {
        #
    }

    public function createNewSolicitationExamConfig(Request $request)
    {
        #
    }

    public function postNewSolicitationExamConfig(Request $request)
    {
        #
    }

    public function createNewResultExamConfig(Request $request)
    {
        #
    }

    public function postNewResultExamConfig(Request $request)
    {
        #
    }

    public function createNewReviewExamConfig(Request $request)
    {
        #
    }

    public function postNewReviewExamConfig(Request $request)
    {
        #
    }

    public function createNewInterviewExamConfig(Request $request)
    {
        #
    }

    public function postNewInterviewExamConfig(Request $request)
    {
        #
    }

    public function createNewPassinscoreExamConfig(Request $request)
    {
        #
    }

    public function postNewPassinscoreExamConfig(Request $request)
    {
        $request->session()->flash('errorperiod', 'Já existe este periodo no sistema');

        $periodUnique = PeriodData::where([
            'ano', '=', $period['ano'],
            'semestre', '=', $period['semestre']
        ])->get();
    }

    public function showExamConfig()
    {
        return view('docente.exam.edit-exam-setting');
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
