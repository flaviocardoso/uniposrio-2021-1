@extends('layout.layout')

@section('content')
<div class="d-flex justify-content-center mt-5">
<div class="col-4">
    <div class="row mb-2">
    <a href="{{ route('collaborator.dashboard.new.exam.period') }}" class="btn btn-primary btn-lg">crie um novo exame</a>
    </div>
    @if ($periodactive)
    <div class="row mb-2">
    <a href="{{ route('collaborator.dashboard.exam.active', $periodactive->id) }}" class="btn btn-primary btn-lg">edite o exame ativo</a>
    </div>
    @endif
    @if (count($periodinactive) > 0)
    <div class="row mb-2 mt-4 d-flex justify-content-center">
    Períodos Inativos / Anteriores
    </div>
    @foreach($periodinactive as $inactive)
    <div class="row mb-2">
    <a href="{{ route('collaborator.dashboard.exam.inative', $inactive->id) }}" class="btn btn-danger btn-lg">{{ $inactive->ano }}.{{ $inactive->semestre }}</a>
    </div>
    @endforeach
    @endif
</div></div>
@endsection