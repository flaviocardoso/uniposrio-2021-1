<?php
namespace App\Traits;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait Login
{
    use RedirectsUsers;

    protected $users = ['student', 'collaborator'];

    protected function redirectSucess(Request $request)
    {
        return $request->wantsJson()
                ? new JsonResource(['message' => trans('')], 201)
                : redirect()->intended($this->redirectPath());
    }

    protected function redirectError(Request $request)
    {
        return redirect()
        ->back()
        ->withErrors(['login' => 'Email/Usuário e/ou senha incorretos'])
        ->withInput(['email' => $request->email]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ], [
            'email.required' => 'E-mail precisa ser inserido',
            'password.required' => 'Senha precisa ser inserida',
            'password.min' => 'Senha tem que ter no minimo de 8 (oito) caracteres'
        ]);
    }

    protected function guard()
    {
        return Auth::guard($this->guard);
    }

    protected function guardLogouts()
    {
        foreach ($this->users as $user) {
            
            if (!($this->guard === $user)) Auth::guard($user)->logout();
        }
    }

    public function index()
    {
        return view('authorization.login');
    }

    public function login(Request $request)
    {
        $this->validator($request->all())->validate();
        $credencials1 = $request->only('email', 'password');
        $credencials2 = ['user' => $request->email, 'password' => $request->password];

        if (    $this->guard()->attempt($credencials1, $request->filled('remember')) 
            ||  $this->guard()->attempt($credencials2, $request->filled('remember'))) {
                $request->session()->regenerate();
                $this->guardLogouts();
                return $this->redirectSucess($request);
        }
        return $this->redirectError($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // $request->flash();
        // $request->regenerate();
        return $this->redirectSucess($request);
    }
}