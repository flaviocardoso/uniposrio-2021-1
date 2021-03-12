<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\EducationalInstituion;
use App\Models\PersonalInfoCollaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollaboratorsController extends Controller
{
    public function list()
    {
        $listusercollaborator = Collaborator::orderBy('name', 'desc')->paginate(15);

        // var_dump($listusercollaborator);

        return view('docente.users.list-users', compact('listusercollaborator'));
    }

    public function updateuser(int $id, Request $request)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->user = $request->user;
        $collaborator->save();
    }

    public function updatenome(int $id, Request $request)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->name = $request->nome;
        $collaborator->save();
    }

    public function updateemail(int $id, Request $request)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->email = $request->email;
        $collaborator->save();
    }

    public function form(int $id)
    {
        $personalinfo = PersonalInfoCollaborator::where('collaborator_id', $id)->first();
        $instituions = EducationalInstituion::all();

        return view('docente.personal-info', compact('personalinfo', 'instituions'));
    }

    public function submit(int $id, Request $request)
    {
        $personalinfo = PersonalInfoCollaborator::where('collaborator_id', $id)->get();
        $message = "";

        /**
         * para instituições
         * se não tiver instituição cadastrada, abre a opção de sigla e nome
         * validação nessas dois campos separadamente
         */

        $campos = $request->only('nacionalidade', 'cpf', 'passaporte', 'instituion', 'departament', 'bond', 'phone');

        Validator::make($campos, 
         [
            'nacionalidade' => ['required'], 
            'cpf' => ['required', 'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'], 
            'passaporte' => ['required'], 
            'instituion' => ['required'], 
            'departament' => ['required'], 
            'bond' => ['required'], 
            'phone' => ['required']
         ]
        )->validate();

        $instituion = $campos['instituion'];

        if ($instituion == '0') {
            $instituionValidator = $request->only('instituionsigla', 'instituionnome');
            Validator::make($instituionValidator, 
            [
                'instituionsigla' => ['required'],
                'instituionnome' => ['required']
            ]
            )->validate();

            $sigla = $instituionValidator['instituionsigla'];
            $nome = $instituionValidator['instituionnome'];
            
            $educationalinstituion = new EducationalInstituion;
            $educationalinstituion->sigla = $sigla;
            $educationalinstituion->nome = $nome;
            $educationalinstituion->save();
            $instituion = ['sigla' => $sigla, 'nome' => $nome];
        } else {
            $siglaEinstituion = explode('|', $instituion);
            $instituion = ['sigla' => $siglaEinstituion[0], 'nome' => $siglaEinstituion[1]];
        }
         if (count($personalinfo) > 0) {
            // atualizar os dados informação pessoal de usuário collaborator
            PersonalInfoCollaborator::where('collaborator_id', $id)
                ->update(
                    [
                        'nacionalidade' => $campos['nacionalidade'], 
                        'cpf' => $campos['cpf'],
                        'passaporte' => $campos['passaporte'],
                        'instituion' => $instituion,
                        'departament' => $campos['departament'],
                        'bond' => $campos['bond'],
                        'phone' => $campos['phone'],
                    ]
                );

            $message = 'Informações atualizadas';
            
        } else {
            // se não tiver ele insere os dados
            // se tiver, pega o id usuário collaborador e atualiza a informação pessoal
            $personalinfocollaborator = new PersonalInfoCollaborator;
            $personalinfocollaborator->nacionalidade =  $campos['nacionalidade'];
            $personalinfocollaborator->cpf = $campos['cpf'];
            $personalinfocollaborator->passaporte = $campos['passaporte'];
            $personalinfocollaborator->instituion = $instituion;
            $personalinfocollaborator->departament = $campos['departament'];
            $personalinfocollaborator->bond = $campos['bond'];
            $personalinfocollaborator->phone = $campos['phone'];
            $personalinfocollaborator->collaborator_id = $id;
            $personalinfocollaborator->save();

            $message = 'Informações salvas';

        }
        
        return redirect()->back()->with('message', $message);
        
    }

    public function toggleActive(int $id)
    {
        $collaborator = Collaborator::find($id);
        $collaborator->active = !($collaborator->active);
        $collaborator->save();
        return back();
    }
    
}
