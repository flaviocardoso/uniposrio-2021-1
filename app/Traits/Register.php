<?php
namespace App\Traits;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait Register
{
    use RedirectsUsers;

    protected $users = ['student', 'collaborator'];

    protected function create(array $data)
    {
        return $this->reflect::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user' => $data['user'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make(
            $data, 
            [
                'name' => ['required', 'string', 'max:255'],
                'user' => ['required', 'string', 'max:255', 'unique:'.$this->base],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.$this->base],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'name.required' => 'O nome precisa ser inserido',
                'user.required' => 'O usuário precisa ser inserido',
                'user.unique' => 'O usuário inserido já existe',
                'email.required' => 'O email precisa ser inserido',
                'email.unique' => 'O e-mail inserido já existe',
                'password.required' => 'A senha precisa ser inserida',
                'password.min' => 'Senha precisa tem no minimo de 8 (oito) caracteres',
                'password.confirmed' => 'Senha precisa ser igual a de confirmação'
            ]
        );
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
        return view('authorization.register');
    }

    public function store(Request $request)
    {
        $this->validator($request->except('_token'))->validate();
        
        event(new Registered($user = $this->create($request->except('_token'))));
        
        $this->guard()->login($user);
        $this->guardLogouts();

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
