<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Login;

class StudentLoginController extends Controller
{
    use Login;

    protected $redirectTo = '/student';
    protected $guard = 'student';

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }
}
