<?php

namespace App\Http\Controllers\Collaborator\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPasswordController extends Controller
{
    use ResetPassword;
    
    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';
    protected $base = 'collaborators';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');

    }  
}
