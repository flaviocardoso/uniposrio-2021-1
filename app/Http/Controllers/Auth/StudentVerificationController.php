<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Verification;
use Illuminate\Http\Request;

class StudentVerificationController extends Controller
{
    use Verification;

    protected $redirectTo = '/student';
}
