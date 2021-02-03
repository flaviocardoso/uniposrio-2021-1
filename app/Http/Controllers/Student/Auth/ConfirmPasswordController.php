<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ConfirmPassword;
use Illuminate\Http\Request;

class ConfirmPasswordController extends Controller
{
    use ConfirmPassword;

    protected $redirectTo = '/student';
    protected $base = 'student';

    public function __construct()
    {
        $this->middleware('auth:student');
    }
}
