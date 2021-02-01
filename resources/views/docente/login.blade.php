@extends('layout.layout')

@section('content')
<div align="center">
<p>Login Colaborador</p>
@error('login')
    <div class="alert alert-danger">
        {{ $message }}        
    </div>
@enderror
<form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control @error('name') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required class="form-control @error('password') is-invalid @enderror"  autocomplete="current-password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="{{ route('register.collaborator') }}" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
        @if (Route::has('forgotPassword.collaborator'))
            <a class="btn btn-link" href="{{ route('forgotPassword.collaborator') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>
@endsection