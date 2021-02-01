<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResetPassword;

class StudentResetPasswordController extends Controller
{
    use ResetPassword;

    protected $redirectTo = '/student';
    protected $guard = 'student';
    protected $base = 'students';

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
}
