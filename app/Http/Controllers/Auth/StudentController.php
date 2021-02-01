<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('authstudent');
    }

    public function index()
    {
        $students = Student::select('name', 'email')->get();
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
