<?php

namespace App\Http\Controllers\Auth;

use App\Facades\CollaboratorPassword;
use App\Facades\Password;
use App\Http\Controllers\Controller;
use App\Traits\ForgotPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class CollaboratorForgotPasswordController extends ForgotPasswordController
{
    use ForgotPassword;
    
    protected $base = 'collaborators';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }
}
