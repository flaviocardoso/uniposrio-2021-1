@extends('layout.layout')

@section('content')
<div align="center">
<p>
@if (Route::is('register.student'))
Register Student
@elseif (Route::is('register.collaborator'))
Register Collaborator
@endif
</p>
<form method="post">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">{{ __('E-mail') }}</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="user">{{ __('User') }}</label>
        <input type="user" name="user" id="user" class="form-control @error('user') is-invalid @enderror"  value="{{ old('user') }}" required autocomplete="email">
        @error('user')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input type="password" name="password" id="password" required class="form-control @error('password') is-invalid @enderror" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm" >{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>
</form>
</div>
@endsection