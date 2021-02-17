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

class ExamDataController extends Controller
{
    public function showExam()
    {
        $periodactive = PeriodData::where('active', true)->first();
        $periodinactive = PeriodData::where('active', false)->get();

        return view(
            'docente.exam.exam',
            compact('periodactive', 'periodinactive')
        );
    }

    /* edite exame ativo */
    public function showExamEdit(int $id, Request $request)
    {
        $periodConfig = PeriodData::find($id);
        if (!$periodConfig) {
            return redirect()->route('collaborator.dashboard.exam');
        }

        $registrationConfig = RegistrationData::where('period_id', $id)->first();
        $examConfig = ExamData::where('period_id', $id)->first();
        $interviewConf = InterviewData::where('period_id', $id)->first();
        $passingscoreMConf = PassingScore::where('period_id', $id)
            ->where('module', 'M')
            ->first();
        $passingscoreDConf = PassingScore::where('period_id', $id)
            ->where('module', 'D')
            ->first();

        $mensagem = $request->session()->get('mensagem');

        return view(
            'docente.exam.edit-exam-setting', 
            compact(
                'periodConfig', 
                'registrationConfig', 
                'examConfig', 
                'interviewConf', 
                'passingscoreMConf',
                'passingscoreDConf',
                'mensagem'
                )
        );
    }

    public function updateExamEdit(int $id, Request $request)
    {
        $mensagem = "";

        switch ($request->update_exam) {
            case 'active_exam':
                $campos = $request->only('activeexam');

                Validator::make($campos, ['activeexam' => ['required']]);

                PeriodData::where('active', true)
                    ->update(['active' => false]);

                $period = PeriodData::find($id);
                $period->active = $campos['activeexam'];
                $period->save();

                if ($campos['activeexam']) {
                    $mensagem = "Periodo ativado";
                } else {
                    $mensagem = "Periodo inativado";
                }

                break;

            case 'registre_exam':
                $campos = $request->only('date_register_start', 'date_register_end');

                Validator::make($campos, [
                    'date_register_start' => ['required', 'date'],
                    'date_register_end' => ['required', 'date', 'after:date_register_start']
                ], [])->validate();
                
                RegistrationData::where('period_id', $id)
                    ->update([
                    'start' => $campos['date_register_start'], 
                    'end' => $campos['date_register_end']
                    ]);

                $mensagem = "Inscrição atualizada";

                break;

            case 'prova_exam':
                $campos = $request->only('date_exam', 'time_start_exam', 'duration_exam', 'num_questions_exam');

                Validator::make($campos, [
                    'date_exam' => ['required', 'date'],
                    'time_start_exam' => ['required'],
                    'duration_exam' => ['required', 'date_format:H:i'],
                    'num_questions_exam' => ['required', 'integer', 'min:1'],])->validate();
                
                ExamData::where('period_id', $id)
                    ->update(['date_exam' => $campos['date_exam'],
                    'time_start_exam' => $campos['time_start_exam'],
                    'duration_exam' => $campos['duration_exam'],
                    'num_questions_exam' => $campos['num_questions_exam']
                ]);

                $mensagem = "Prova atualizada";

                break;

            case 'download_exam':
                $campos = $request->only('time_start_download_exam', 'time_end_download_exam');

                Validator::make($campos, [
                    'time_start_download_exam' => ['required'],
                    'time_end_download_exam' => ['required', 'after:time_start_download_exam']
                    ])->validate();

                ExamData::where('period_id', $id)
                    ->update(['time_start_download_exam' => $campos['time_start_download_exam'],
                    'time_end_download_exam' => $campos['time_end_download_exam']
                ]);

                $mensagem = "Download atualizado";

                break;

            case 'result_exam':
                $campos = $request->only('date_solicitation_exam', 'date_result_exam');

                Validator::make($campos, [
                    'date_solicitation_exam' => ['required', 'date'],
                    'date_result_exam' => ['required', 'date']
                    ])->validate();
                
                ExamData::where('period_id', $id)
                    ->update(['date_solicitation_exam' => $campos['date_solicitation_exam'],
                    'date_result_exam' => $campos['date_result_exam']
                ]);

                $mensagem = "Solicitação e Resultado atualizados";

                break;

            case 'review_exam':
                $campos = $request->only('date_review', 'time_review');

                Validator::make($campos, [
                    'date_review' => ['required', 'date'],
                    'time_review' => ['required']
                    ])->validate();
    
                ExamData::where('period_id', $id)
                    ->update(['date_review' => $campos['date_review'],
                    'time_review' => $campos['time_review']
                ]);

                $mensagem = "Revisão atualizado";

                break;

            case 'interview_exam':
                $campos = $request->only('date_interview_start', 'date_interview_end');

                Validator::make($campos, [
                    'date_interview_start' => ['required', 'date'],
                    'date_interview_end' => ['required', 'date', 'after:date_interview_start']
                    ])->validate();

                InterviewData::where('period_id', $id)
                    ->update(['start' => $campos['date_interview_start'],
                    'end' => $campos['date_interview_end']
                ]);

                $mensagem = "Intrevista atualizada";

                break;

            case 'mestrado_exam':
                $campos = $request->only('instituionsM');

                PassingScore::where('period_id', $id)
                    ->where('module', 'M')
                    ->update(['instituions' => $campos['instituionsM']]);

                $mensagem = "Pontos de corte de Mestrado atualizado";
                
                break;

            case 'doutorado_exam':
                $campos = $request->only('instituionsD');

                PassingScore::where('period_id', $id)
                    ->where('module', 'D')
                    ->update(['instituions' => $campos['instituionsD']]);

                $mensagem = "Pontos de corte de Doutorado atualizado";

                break;
        }

        return redirect(
            redirect()->back()->getTargetUrl() . '#' . $request->update_exam
            )->with($request->update_exam, $mensagem);
    }
}
