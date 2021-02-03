<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use Login;

    protected $redirectTo = '/student';
    protected $guard = 'student';

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

}
