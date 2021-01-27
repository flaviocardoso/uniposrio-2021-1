<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:student', ['except' => ['logout']]);
    }

    public function index()
    {
        return view('formLogin.student');
    }

    public function login(Request $request)
    {
        $credencials = $request->only('email', 'password');

        if (Auth::attempt($credencials) ) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard.student');
        }

        return back()
        ->withErrors([
            'email' => 'Mensagem que não conseguiu logar'
        ])
        ->withInput(['email' => $request->email]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student');
    }
}
