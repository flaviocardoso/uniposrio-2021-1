<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('collaborator');
    }

    public function index()
    {
        return view('docente.collaborator');
    }
}
