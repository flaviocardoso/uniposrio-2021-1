<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ResetPassword;

class CollaboratorResetPasswordController extends Controller
{
    use ResetPassword;
    
    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';
    protected $base = 'collaborator';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }  
}
