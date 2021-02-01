<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('authcollaborator');
    }

    public function index()
    {
        $collaborators = Collaborator::select('name', 'email')->get();
        return view('docente.index', compact('collaborators'));
    }
}
