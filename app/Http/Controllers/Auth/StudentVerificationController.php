<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Verification;
use Illuminate\Http\Request;

class StudentVerificationController extends Controller
{
    use Verification;

    protected $redirectTo = '/student';
    protected $guard = 'student';

    public function __construct()
    {
        $this->middleware('auth.student')->except('logout');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
