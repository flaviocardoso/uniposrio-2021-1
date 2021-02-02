<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Verification;
use Illuminate\Http\Request;

class CollaboratorVerificationController extends Controller
{
    use Verification;

    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';

    public function __construct()
    {
        $this->middleware('auth.collaborator')->except('logout');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
