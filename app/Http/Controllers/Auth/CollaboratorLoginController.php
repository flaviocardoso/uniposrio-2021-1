<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Login;

class CollaboratorLoginController extends Controller
{
    use Login;

    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }
}
