<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:collaborator');
        $this->middleware('verified:collaborator.verify');
        $this->middleware('password.confirm:collaborator.confirm');
    }

    public function index()
    {
        $collaborators = Collaborator::select('name', 'email', 'email_verified_at')->get();
        return view('docente.index', compact('collaborators'));
    }
}
