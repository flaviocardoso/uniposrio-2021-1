@extends('layout.layout')

@section('content')
<form method="post">
@csrf
<div class="row">
<div class="col">
Definições da Prova
</div>
</div>

<br>

<div class="row">
<div class="col">
Data das Inscrições
</div>
</div>

<br>

<div class="form-group">

<div class="row">
<div class="col-1">
<label for="startregistrationexam">Início</label>
</div>
<div class="col-4">
<input type="date" name="start" value="{{ $examregistrationconfig->start ?? '' }}" id="startregistrationexam" min="{{ date('Y') }}" max="2100" size="2" class="@error('ano') is-invalid @enderror" required>
@error('start')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row">
<div class="col-1">
<label for="endregistrationexam">Terminino</label>
</div>
<div class="col-4">
<input type="date" name="end" value="{{ $examregistrationconfig->end ?? '' }}" id="endregistrationexam" min="1" max="2.9" step="0.1" class="@error('semestre') is-invalid @enderror" required>
@error('end')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<br>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.period') }}" class="btn btn-danger">Anterior</a>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
</div>

@endsection