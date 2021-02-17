<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RedefineController extends Controller
{
    public function form()
    {
        return view('docente.redefine-password');
    }

    public function submit(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $id = Auth::guard('collaborator')->user()->id;

        $collaboator = Collaborator::find($id);

        $collaboator->password = Hash::make($request->password);
        $collaboator->save();

        return redirect()->back()->with('success', 'Senha Atualizada!');
    }

    protected function rules()
    {
        return [
            'password' => 'required|confirmed|min:8',
        ];
    }

    protected function validationErrorMessages()
    {
        return [];
    }
}
