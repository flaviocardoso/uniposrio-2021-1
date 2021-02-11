<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\ExamData;
use App\Models\InterviewData;
use App\Models\PassingScore;
use App\Models\PeriodData;
use App\Models\RegistrationData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
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
        } else {
            $periodConfig = $request->session()->get('examperiodconfig');
        }

        $periodConfig->fill($period);
        $request->session()->put('examperiodconfig', $periodConfig);

        return redirect()->route('collaborator.dashboard.new.exam.registration');
    }

    public function createNewRegistrationExamConfig(Request $request)
    {
        return view('docente.exam.registration-date-exam-setting', ['examregistrationconfig' => $request->session()->get('examregistrationconfig')]);
    }

    public function postNewRegistrationExamConfig(Request $request)
    {
        $registration = $request->only('start', 'end');

        Validator::make($registration,
        [
            'start' => ['required', 'date'],
            'end' => ['required', 'date']
        ], [
            'start.required' => 'O inicio da data de inscrição precisa ser inserio',
            'start.date' => 'O inicio da data de inscrição tem que ser de formato de data',
            'end.required' => 'A data de terminio de inscrição precisa ser inserio',
            'end.date' => 'O inicio da data de inscrição tem que ser de formato de data',
        ]
        )->validate();

        if (empty($request->session()->get('examregistrationconfig'))) {
            $registrationConfig = new RegistrationData();
        } else {
            $registrationConfig = $request->session()->get('examregistrationconfig');
        }

        $registrationConfig->fill($registration);
        $request->session()->put('examregistrationconfig', $registrationConfig);

        return redirect()->route('colllaborator.dashboard.new.exam.exam');
    }

    public function createNewExamExamConfig(Request $request)
    {
        return view('docente.exam.date-exam-setting', ['examexamconfig' => $request->session()->get('examexamconfig')]);
    }

    public function postNewExamExamConfig(Request $request)
    {
        $exam = $request->only(
            'date_exam', 
            'time_start_exam', 
            'duration_exam', 
            'num_questions_exam', 
            'time_start_download_exam', 
            'time_end_download_exam'
        );

        Validator::make($exam,
        [
            'date_exam' => ['required', 'date'],
            'time_start_exam' => ['required', 'time'],
            'duration_exam' => ['required', 'time'],
            'num_questions_exam' => ['required', 'integer'],
            'time_start_download_exam' => ['required', 'time'],
            'time_end_download_exam' => ['required', 'time']
        ], [
            'date_exam.required' => 'A data de exame precisa ser inserido',
            'date_exam.date' => 'A data de exame precisa ser uma data',
            'time_start_exam.required' => 'O horário de início do exame precisa ser inserido',
            'time_start_exam.time' => 'O horário de início do exame precisa ser um horário',
            'duration_exam.required' => 'A duração do exame precisa ser inserida',
            'duration_exam.time' => 'A duraração do exame precisa ser um horário',
            'num_questions_exam.interger' => 'A quantidade de questões precisa ser um número',
            'time_start_download_exam.required' => 'O horário de início do download de prova precisa ser inserido',
            'time_start_download_exam.time' => 'O horário de início do download de prova precisa ser um horário', 
            'time_end_download_exam.required' => 'O horário de início do download de prova precisa ser inserido',
            'time_end_download_exam.time' => 'O horário de início do download de prova precisa ser um horário', 
        ])->validate();

        if (empty($request->session()->get('examexamconfig'))) {
            $examConfig = new ExamData();
        } else {
            $examConfig = $request->session()->get('examexamconfig');
        }

        $examConfig->fill($exam);
        $request->session()->put('examexamconfig', $examConfig);

        return redirect()->route('colllaborator.dashboard.new.exam.complement');
    }

    public function createNewComplementExamConfig(Request $request)
    {
        return view('complement-date-exam-setting', ['examexamconfig' => $request->session()->get('examexamconfig')]);
    }

    public function postNewComplementExamConfig(Request $request)
    {
        $complement = $request->only(
            'date_solicitation_exam', 
            'date_result_exam', 
            'date_review', 
            'time_review'
        );

        Validator::make($complement,
        [
            'date_solicitation_exam' => ['required', 'date'],
            'date_result_exam' => ['required', 'date'],
            'date_review' => ['required', 'date'],
            'time_review' => ['required', 'time']
        ],
        [
            'date_solicitation_exam.required' => 'A data de solicitação precisa ser iniserida',
            'date_solicitation_exam.date' => 'A data de solicitação precisa ser uma data',
            'date_result_exam.required' => 'A data do resultado precisa ser inserida',
            'date_result_exam.date' => 'A data de resultado precisa ser uma data',
            'date_review.required' => 'A data de revisão precisa ser inserida',
            'date_review.date' => 'A data de revisão precisa ser uma data',
            'time_review.required' => 'O horário de início de revisão precisa ser inserida',
            'time_review.time' => 'O horário de início de revisão precisa ser um horário'
        ])->validate();

        if (empty($request->session()->get('examexamconfig'))) {
            $examConfig = new ExamData();
        } else {
            $examConfig = $request->session()->get('examexamconfig');
        }

        $examConfig->fill($complement);
        $request->session()->put('examexamconfig', $examConfig);

        return redirect()->route('collaborator.dashboard.new.exam.interview');
    }

    public function createNewInterviewExamConfig(Request $request)
    {
        return view('docente.exam.interview-date-exam', ['interviewexamconfig' => $request->session()->get('interviewexamconfig')]);
    }

    public function postNewInterviewExamConfig(Request $request)
    {
        $interview = $request->only('start', 'end');

        Validator::make(
            $interview,
            [
                'start' => ['required', 'date'],
                'end' => ['required', 'date'],
            ],
            [
                'start.required' => 'A data de início da intrevista precisa ser inserida',
                'start.date' => 'A data de início de intrevista precisa ser uma data',
                'end.required' => 'A data de término de intrevista precida ser inserido',
                'end.date' => 'A data de término de intrevista precisa ser uma data'
            ]
        )->validate();
        
        if (empty($request->session()->get('interviewexamconfig'))) {
            $interviewConf = new InterviewData();
        } else {
            $interviewConf = $request->session()->get('interviewexamconfig');
        }

        $interviewConf->fill($interview);
        $request->session()->put('interviewexamconfig', $interviewConf);

        return redirect()->route('collaborator.dashboard.new.exam.passingscore');
    }

    public function createNewPassinscoreExamConfig(Request $request)
    {
        return view('docente.exam.passigscore-exam', 
        [
            'passingscoreMexamconfig' => $request->session()->get('passingscoreMexamconfig'),
            'passingscoreDexamconfig' => $request->session()->get('passingscoreDexamconfig')
        ]);
    }

    public function postNewPassinscoreExamConfig(Request $request)
    {
        $passingscore = $request->all();


        if (
            empty($request->session()->get('passingscoreMexamconfig')) &&
            empty($request->session()->get('passingscoreDexamconfig'))
            ) {
            $passingscoreM = new PassingScore();
            $passingscoreD = new PassingScore();
        } else {
            if (empty($request->session()->get('passingscoreMexamconfig'))) {
                $passingscoreM = new PassingScore();
            } else {
                $passingscoreM = $request->session()->get('passingscoreMexamconfig');
            }

            if (empty($request->session()->get('passingscoreDexamconfig'))) {
                $passingscoreD = new PassingScore();
            } else {
                $passingscoreD = $request->session()->get('passingscoreDexamconfig');
            }
        }

        $passingscoreM->fill(['module' => 'M', 'instituions' => $passingscore['instituionsM']]);
        $passingscoreD->fill(['module' => 'D', 'instituions' => $passingscore['instituionsD']]);

        $request->session()->put('passingscoreMexamconfig', $passingscoreM);
        $request->session()->put('passingscoreDexamconfig', $passingscoreD);

        return redirect()->route('collaborator.dashboard.new.exam.conclusion');
    }

    public function createNewExamConclusion(Request $request)
    {
        return view('docente.exam.conclusion-exam-config', 
            [
                'examperiodconfig' => $request->session()->get('examperiodconfig'),
                'examregistrationconfig' => $request->session()->get('examregistrationconfig'),
                'examexamconfig' => $request->session()->get('examexamconfig'),
                'interviewexamconfig' => $request->session()->get('interviewexamconfig'),
                'passingscoreMexamconfig' => $request->session()->get('passingscoreMexamconfig'),
                'passingscoreDexamconfig' => $request->session()->get('passingscoreDexamconfig')
            ]
        );
    }

    public function postNewExamConclution(Request $request)
    {

        $period = $request->session()->get('examperiodconfig');

        $periodUnique = PeriodData::where([
            'ano', '=', $period['ano'],
            'semestre', '=', $period['semestre']
        ])->get();

        if ($periodUnique->count() > 0) {
            $request->session()->flash('errorperiod', 'Já existe este periodo no sistema');

            return $request->wantsJson()
                ? new JsonResource(['message' => trans('')], 201) 
                : redirect()->route('dashboard.new.exam.period');
        }

        $period->save();
        $periodId = $period->id;

        $registration = $request->session()->get('examregistrationconfig');
        $registration->fill(
            [
                'collaborator_id' => Auth::guard('collaborator')->user()->id,
                'period_id' => $periodId
            ]
        );
        $registration->save();

        $exam = $request->session()->get('examexamconfig');
        $exam->fill(
            [
                'collaborator_id' => Auth::guard('collaborator')->user()->id,
                'period_id' => $periodId
            ]
        );
        $exam->save();

        $interview = $request->session()->get('interviewexamconfig');
        $interview->fill(
            [
                'collaborator_id' => Auth::guard('collaborator')->user()->id,
                'period_id' => $periodId
            ]
        );
        $interview->save();

        $passingscoreM = $request->session()->get('passingscoreMexamconfig');
        $passingscoreM->fill(
            [
                'collaborator_id' => Auth::guard('collaborator')->user()->id,
                'period_id' => $periodId
            ]
        );
        $passingscoreM->save();

        $passingscoreD = $request->session()->get('passingscoreDexamconfig');
        $passingscoreD->fill(
            [
                'collaborator_id' => Auth::guard('collaborator')->user()->id,
                'period_id' => $periodId
            ]
        );
        $passingscoreD->save();

        return redirect()->route('');
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
