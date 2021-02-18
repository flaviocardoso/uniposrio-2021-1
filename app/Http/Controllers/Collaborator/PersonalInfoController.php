<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PersonalInfoController extends Controller
{
    public function form()
    {
        // chamar a classe de informação pessoal pelo id de usuário collaborador
        $id = Auth::guard('collabarator')->user()->id;
        $personalinfo = PersonalInfoCollaborator::where('collaborator_id', $id)->first();

        return view('docente.personal-info', compact('personalinfo'));
    }

    public function submit(Request $request)
    {
        // verificar se já tem os dados de informação pessoal de usuário collabotor
        $id = Auth::guard('collabarator')->user()->id;
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
            'passaporte' => [], 
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

            $sigla = $instituionValidator['sigla'];
            $nome = $instituionValidator['nome'];
            
            $educationalinstituion = new EducationalInstituion;
            $educationalinstituion->sigla = $sigla;
            $educationalinstituion->nome = $nome;
            $educationalinstituion->save();
            $instituion = $educationalinstituion->id;
        }
        
         if (count($personalinfo) > 0) {
            // atualizar os dados informação pessoal de usuário collaborator
            PersonalInfoCollaborator::where('collaborator_id', $id)
                ->update(
                    [
                        'nacionalidade' => $campos['nacionalidade'], 
                        'cpf' => $campos['cpf'],
                        'passaporte' => $campos['passaporte'],
                        'instituion_id' => $instituion,
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
            $personalinfocollaborator->instituion_id = $instituion;
            $personalinfocollaborator->departament = $campos['departament'];
            $personalinfocollaborator->bond = $campos['bond'];
            $personalinfocollaborator->phone = $campos['phone'];
            $personalinfocollaborator->collaborator_id = $id;
            $personalinfocollaborator->save();

            $message = 'Informações salvas';

        }
        
        return redirect()->back()->with('message', $message);
        
    }

    public function update()
    {
        //
    }
}
