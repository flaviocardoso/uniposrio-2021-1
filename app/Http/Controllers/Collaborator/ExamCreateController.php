<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\ExamData;
use App\Models\InterviewData;
use App\Models\ParticipationInstituion;
use App\Models\PassingScore;
use App\Models\PeriodData;
use App\Models\RegistrationData;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExamCreateController extends Controller
{
    public function createNewPeriodExamConfig(Request $request)
    {
        return view('docente.exam.create-period-exam-setting', 
            [
                'examperiodconfig' => $request->session()->get('examperiodconfig'),
                'errorperiod' => $request->session()->get('errorperiod')
            ]);
    }

    /* criar exame */
    public function postNewPeriodExamConfig(Request $request)
    {
        $period = $request->only('ano', 'semestre', 'active', 'registro');

        Validator::make($period,
        [
            'ano' => ['required', 'integer', 'min:2010', 'max:2100'],
            'semestre' => ['required', 'regex:/^\d{1,2}(\.\d{1,9})?$/'],
            'registro' => ['required', 'string'],
            'active' => ['required', 'in:1,0']
        ], [
            'ano.required' => 'O ano precisa ser inserido',
            'ano.integer' => 'O ano precisa ser inteiro',
            'ano.min' => 'O ano tem que ser maior ou igual a 2010',
            'ano.max' => 'O ano tem que ser menor ou igual a 2100',
            'ano.unique' => 'Já existe ano e semestre no sistema',
            'semestre.required' => 'O semestre precisa ser inserido',
            'semestre.regex' => 'O semestre precisa ser 1 a 2.9',
            'semestre.unique' => 'Já existe ano e semestre no sistema',
            'active.required' => 'A situação precisa ser inserido'
        ])->validate();


        $periodUnique = PeriodData::where('ano', $period['ano'])
            ->where('semestre', $period['semestre'])
            ->get();

        if (count($periodUnique) > 0) {
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

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.registration');
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
            'end' => ['required', 'date', 'after:start']
        ], [
            'start.required' => 'O inicio da data de inscrição precisa ser inserio',
            'start.date' => 'O inicio da data de inscrição tem que ser de formato de data',
            'end.required' => 'A data de terminio de inscrição precisa ser inserio',
            'end.date' => 'A data de inscrição tem que ser de formato de data',
            'end.after' => 'A data de termínio de inscrição tem que ser superior a de início',
        ]
        )->validate();

        if (empty($request->session()->get('examregistrationconfig'))) {
            $registrationConfig = new RegistrationData();
        } else {
            $registrationConfig = $request->session()->get('examregistrationconfig');
        }

        $registrationConfig->fill($registration);
        $request->session()->put('examregistrationconfig', $registrationConfig);

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.exam');
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
            'time_start_exam' => ['required'],
            'duration_exam' => ['required', 'date_format:H:i'],
            'num_questions_exam' => ['required', 'integer', 'min:1'],
            'time_start_download_exam' => ['required'],
            'time_end_download_exam' => ['required', 'after:time_start_download_exam']
        ], [
            'date_exam.required' => 'A data de exame precisa ser inserido',
            'date_exam.date' => 'A data de exame precisa ser uma data',
            'time_start_exam.required' => 'O horário de início do exame precisa ser inserido',
            'time_start_exam.date_format' => 'O horário de início do exame precisa ser um horário',
            'duration_exam.required' => 'A duração do exame precisa ser inserida',
            'duration_exam.date_format' => 'A duraração do exame precisa ser do formato de HH:MM',
            'num_questions_exam.interger' => 'A quantidade de questões precisa ser um número',
            'time_start_download_exam.required' => 'O horário de início do download de prova precisa ser inserido',
            'time_start_download_exam.date_format' => 'O horário de início do download de prova precisa ser um horário', 
            'time_end_download_exam.required' => 'O horário de início do download de prova precisa ser inserido',
            'time_end_download_exam.date_format' => 'O horário de términio do download de prova precisa ser um horário', 
            'time_end_download_exam.after' => 'O horário de términio do download precisa ser maior do ser inicio', 
        ])->validate();

        if (empty($request->session()->get('examexamconfig'))) {
            $examConfig = new ExamData();
        } else {
            $examConfig = $request->session()->get('examexamconfig');
        }

        $examConfig->fill($exam);
        $request->session()->put('examexamconfig', $examConfig);

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.complement');
    }

    public function createNewComplementExamConfig(Request $request)
    {
        return view('docente.exam.complement-date-exam-setting', ['examexamconfig' => $request->session()->get('examexamconfig')]);
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
            'time_review' => ['required']
        ],
        [
            'date_solicitation_exam.required' => 'A data de solicitação precisa ser iniserida',
            'date_solicitation_exam.date' => 'A data de solicitação precisa ser uma data',
            'date_result_exam.required' => 'A data do resultado precisa ser inserida',
            'date_result_exam.date' => 'A data de resultado precisa ser uma data',
            'date_review.required' => 'A data de revisão precisa ser inserida',
            'date_review.date' => 'A data de revisão precisa ser uma data',
            'time_review.required' => 'O horário de início de revisão precisa ser inserida',
            'time_review.date_format' => 'O horário de início de revisão precisa ser um horário'
        ])->validate();

        if (empty($request->session()->get('examexamconfig'))) {
            $examConfig = new ExamData();
        } else {
            $examConfig = $request->session()->get('examexamconfig');
        }

        $examConfig->fill($complement);
        $request->session()->put('examexamconfig', $examConfig);

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.interview');
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
                'end' => ['required', 'date', 'after:start'],
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

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.passingscore');
    }

    public function createNewPassingscoreExamConfig(Request $request)
    {
        $instituionsMestrado = ParticipationInstituion::select('instituions')->where('module', '=', 'M')->first();
        $instituionsDoutorado = ParticipationInstituion::select('instituions')->where('module', '=', 'D')->first();

        // var_dump($request->session()->get('passingscoreMexamconfig'));
        // exit;
        return view('docente.exam.passingscore-exam', 
        [
            'instituionsmestrado' => $instituionsMestrado->instituions,
            'instituionsdoutorado' => $instituionsDoutorado->instituions,
            'passingscoreMexamconfig' => $request->session()->get('passingscoreMexamconfig'),
            'passingscoreDexamconfig' => $request->session()->get('passingscoreDexamconfig')
        ]);
    }

    public function postNewPassingscoreExamConfig(Request $request)
    {
        $passingscore = $request->only('instituionsM', 'instituionsD');

        if (
            empty($request->session()->get('passingscoreMexamconfig')) &&
            empty($request->session()->get('passingscoreDexamconfig'))
            ) {
            $passingscoreM = new PassingScore();
            $passingscoreD = new PassingScore();
        } else {
            $passingscoreM = $request->session()->get('passingscoreMexamconfig');
            $passingscoreD = $request->session()->get('passingscoreDexamconfig');
        }

        $passingscoreM->fill(['module' => 'M', 'instituions' => $passingscore['instituionsM']]);
        $passingscoreD->fill(['module' => 'D', 'instituions' => $passingscore['instituionsD']]);

        $request->session()->put('passingscoreMexamconfig', $passingscoreM);
        $request->session()->put('passingscoreDexamconfig', $passingscoreD);

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.new.exam.conclusion');
    }

    public function createNewExamConclusion(Request $request)
    {
        $examperiodconfig = $request->session()->get('examperiodconfig');
        $examregistrationconfig = $request->session()->get('examregistrationconfig');
        $examexamconfig = $request->session()->get('examexamconfig');
        $interviewexamconfig = $request->session()->get('interviewexamconfig');
        $passingscoreMexamconfig = $request->session()->get('passingscoreMexamconfig');
        $passingscoreDexamconfig = $request->session()->get('passingscoreDexamconfig');

        if (
            is_null($examperiodconfig) ||
            is_null($examregistrationconfig) ||
            is_null($examexamconfig) ||
            is_null($interviewexamconfig) ||
            is_null($passingscoreMexamconfig) ||
            is_null($passingscoreDexamconfig)
            ) {
                return $request->wantsJson()
                ? new JsonResource(['message' => trans('')], 201) 
                : redirect()->route('collaborator.dashboard.new.exam.period');
            }
        
        return view('docente.exam.conclusion-exam-config', 
            [
                'examperiodconfig' => $examperiodconfig,
                'examregistrationconfig' => $examregistrationconfig,
                'examexamconfig' => $examexamconfig,
                'interviewexamconfig' => $interviewexamconfig,
                'passingscoreMexamconfig' => $passingscoreMexamconfig,
                'passingscoreDexamconfig' => $passingscoreDexamconfig
            ]
        );
    }

    public function postNewExamConclution(Request $request)
    {
        $collaboratorId = Auth::guard('collaborator')->user()->id;
        $period = $request->session()->get('examperiodconfig');
        // var_dump($period);
        // exit;

        $periodUnique = PeriodData::where('ano', $period['ano'])
            ->where('semestre', $period['semestre'])
            ->get();

        if (count($periodUnique) > 0) {
            $request->session()->flash('errorperiod', 'Já existe este periodo no sistema');

            return $request->wantsJson()
                ? new JsonResource(['message' => trans('')], 201) 
                : redirect()->route('dashboard.new.exam.period');
        }

        PeriodData::where('active', true)
            ->update(['active' => false]);
    
        $period->fill(['collaborator_id' => $collaboratorId]);
        $period->save();

        $periodId = $period->id;

        $associate = [
            'collaborator_id' => $collaboratorId,
            'period_id' => $periodId
        ];

        $registration = $request->session()->get('examregistrationconfig');
        $registration->fill($associate);
        $registration->save();

        $exam = $request->session()->get('examexamconfig');
        $exam->fill($associate);
        $exam->save();

        $interview = $request->session()->get('interviewexamconfig');
        $interview->fill($associate);
        $interview->save();

        $passingscoreM = $request->session()->get('passingscoreMexamconfig');
        $passingscoreM->fill($associate);
        $passingscoreM->save();

        $passingscoreD = $request->session()->get('passingscoreDexamconfig');
        $passingscoreD->fill($associate);
        $passingscoreD->save();

        // terminar a sessão
        $request->session()->forget('examperiodconfig');
        $request->session()->forget('examregistrationconfig');
        $request->session()->forget('examexamconfig');
        $request->session()->forget('interviewexamconfig');
        $request->session()->forget('passingscoreMexamconfig');
        $request->session()->forget('passingscoreDexamconfig');

        return $request->wantsJson()
        ? new JsonResource(['message' => trans('')], 201) 
        : redirect()->route('collaborator.dashboard.exam');
    }
    /* fim de criar exame */

}
