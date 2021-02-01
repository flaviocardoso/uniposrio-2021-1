<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Password;
use App\Http\Controllers\Controller;
use App\Traits\ForgotPassword;
use Illuminate\Http\Request;

class StudentForgotPasswordController extends ForgotPasswordController
{
    use ForgotPassword;
    
    protected $base  = 'students';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }
}
