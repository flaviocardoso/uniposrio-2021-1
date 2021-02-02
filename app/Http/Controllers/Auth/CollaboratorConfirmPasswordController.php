<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ConfirmPassword;
use Illuminate\Http\Request;

class CollaboratorConfirmPasswordController extends Controller
{
    use ConfirmPassword;

    protected $redirectTo = '/collaborator';
    protected $base = 'collaborator';

    public function __construct()
    {
        $this->middleware('auth.collaborator');
    }
}
