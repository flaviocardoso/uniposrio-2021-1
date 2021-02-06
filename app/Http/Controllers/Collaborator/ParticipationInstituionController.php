<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\ParticipationInstituion;
use Illuminate\Http\Request;

class ParticipationInstituionController extends Controller
{
    public function index()
    {
        $participation_instituions = ParticipationInstituion::all();
        // var_dump($participation_instituions);
        // exit;
        return view('docente.participation_instituion', compact('participation_instituions'));
    }

    public function showFormUpdate(int $id)
    {
        $participation_instituion = ParticipationInstituion::find($id);
        // var_dump($participation_instituion);
        // exit;
        return view('docente.participation_instituion_update', compact('participation_instituion'));
    }

    public function update(int $id, Request $request)
    {
        $participation_instituion = ParticipationInstituion::find($id);

        $participation_instituion->instituions = $request->instituions;
        $participation_instituion->save();

        return redirect()->route('collaborator.participation.instituion');
    }
}
