<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('verified:student.verify');
        $this->middleware('password.confirm:student.confirm');
    }

    public function index()
    {
        $students = Student::select('name', 'email', 'email_verified_at')->get();
        return view('discente.index', compact('students'));
    }

    public function registerExam()
    {
        //
    }

    public function formRedefinePassword()
    {
        //
    }

    public function submitRedefinePassword()
    {
        //
    }
}
