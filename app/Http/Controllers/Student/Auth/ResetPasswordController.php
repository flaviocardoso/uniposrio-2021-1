<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPasswordController extends Controller
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
