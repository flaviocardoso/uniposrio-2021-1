<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Traits\Register;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use Register;

    protected $redirectTo = '/student';
    protected $guard = 'student';
    protected $reflect = Student::class;
    protected $base = 'students';

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
}
