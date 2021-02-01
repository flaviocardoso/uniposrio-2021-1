<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Verification;
use Illuminate\Http\Request;

class CollaboratorVerificationController extends Controller
{
    use Verification;

    protected $rdirectTo = '/collaborator';
}
