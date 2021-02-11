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

<div class="form-group">
<div class="row">
<div class="col-1">
<label>Data da Prova</label>
</div>
<br>
<div class="col-4">
<input name="date_exam" type="date" required value="">
</div>
</div>
</div>

<hr>

<div class="form-group">

<div class="row">
<div class="col-1">
<label for="">Hora de Inicio</label>
</div>
<div class="col-4">
<input type="time" name="time_start_exam" value="{{ $examregistrationconfig->date_review ?? '' }}" id="date_review" class="@error('time_start_exam') is-invalid @enderror" required>
@error('time_start_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row">
<div class="col-1">
<label for="duration_exam">Duração</label>
</div>
<div class="col-4">
<input type="time" name="duration_exam" value="{{ $examregistrationconfig->duration_exam ?? '' }}" id="duration_exam" class="@error('duration_exam') is-invalid @enderror" required>
@error('duration_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row">
<div class="col-1">
<label for="num_questions_exam">Qtd. de Questões</label>
</div>
<div class="col-4">
<input type="number" name="num_questions_exam" value="{{ $examregistrationconfig->num_questions_exam ?? '' }}" id="num_questions_exam" class="@error('num_questions_exam') is-invalid @enderror" required>
@error('num_questions_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row">
<div class="col-1">
<label for="time_start_download_exam">Inicio de Download de Porva</label>
</div>
<div class="col-4">
<input type="time" name="time_start_download_exam" value="{{ $examregistrationconfig->time_start_download_exam ?? '' }}" id="time_start_download_exam" class="@error('time_start_download_exam') is-invalid @enderror" required>
@error('time_start_download_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row">
<div class="col-1">
<label for="time_end_download_exam">Termino de Download de Prova</label>
</div>
<div class="col-4">
<input type="time" name="time_end_download_exam" value="{{ $examregistrationconfig->time_end_download_exam ?? '' }}" id="time_end_download_exam" class="@error('time_end_download_exam') is-invalid @enderror" required>
@error('time_end_download_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<br>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.registration') }}" class="btn btn-danger">Anterior</a>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
</div>

</fom>
@endsection