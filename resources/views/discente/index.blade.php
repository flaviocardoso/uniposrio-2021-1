@extends('layout.layout')

@section('content')
<div align="center">
<div>
    @if (session('verified'))
    <p>Email verificado!</p>
    @endif
    @if (Auth::guard('student'))
    <p>dashboard student</p>
    <p>{{ Auth::guard('student')->user()->id }} - {{ Auth::guard('student')->user()->user }}</p>
    <p>
        <a href="{{ route('student.logout') }}" class="btn btn-secondary mt-3">
            Logout
        </a>
    </p>
    <p>Lista</p>
    @foreach ($students as $student)
    <div class="row">
        <div class="col">{{ $student->name }}</div>
        <div class="col">{{ $student->email }}</div>
        <div class="col">{{ $student['email_verified_at'] }}</div>
    </div>
    @endforeach
    @endif
</div>
</div>
@endsection