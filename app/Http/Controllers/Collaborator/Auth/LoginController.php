<?php

namespace App\Http\Controllers\Collaborator\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Login;

class LoginController extends Controller
{
    use Login;

    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }
}
