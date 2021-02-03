<?php

namespace App\Http\Controllers\Collaborator\Auth;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Traits\Register;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use Register;

    protected $redirectTo = '/collaborator';
    protected $guard = 'collaborator';
    protected $reflect = Collaborator::class;
    protected $base = 'collaborators';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');
    }
}
