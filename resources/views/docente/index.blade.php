@extends('layout.layout')

@section('content')
<div align="center">
<div>
    <p>dashboard collaborator {{ Auth::guard('collaborator')->user()->user }}</p>
    <p>
        <a href="{{ route('collaborator.logout') }}" class="btn btn-secondary mt-3">
            Logout
        </a>
    </p>
    <p>Lista</p>
    @foreach ($collaborators as $collaborator)
    <div class="row">
        <div class="col">{{ $collaborator->name }}</div>
        <div class="col">{{ $collaborator->email }}</div>
        <div class="col">{{ $collaborator->email_verified_at }}</div>
    </div>
    @endforeach
</div>
</div>
@endsection