<?php

namespace App\Http\Controllers\Collaborator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecommendationLetterController extends Controller
{
    public function form()
    {
        return view('docente.recommendation-letter');
    }

    public function submit(Request $request)
    {
        //
    }
}
