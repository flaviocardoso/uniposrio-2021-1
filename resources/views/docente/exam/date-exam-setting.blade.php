@extends('layout.layout')

@section('content')
<form method="post">
@csrf
<div class="row">
<div class="col">
Definições da Prova
</div>
</div>

<hr>

<div class="row">
<div class="col-4 d-flex justify-content-center">
Prova
</div>
</div>

<br>

<div class="form-group">
<div class="row">
<div class="col-2">
<label>Data : </label>
</div>
<br>
<div class="col-2">
<input name="date_exam" type="date" value="{{ old('date_exam', $examexamconfig->date_exam ?? '') }}" class="@error('date_exam') is-invalid @enderror form-control" required>
@error('date_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>

<br>

<div class="form-group">

<div class="row">
<div class="col-2">
<label for="">Hora de Início : </label>
</div>
<div class="col-2">
<input type="time" name="time_start_exam" value="{{ old('time_start_exam', $examexamconfig->time_start_exam ?? '' ) }}" id="date_review" class="@error('time_start_exam') is-invalid @enderror form-control" required>
@error('time_start_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<br>

<div class="row">
<div class="col-2">
<label for="duration_exam">Duração (HH:MM) : </label>
</div>
<div class="col-2">
<input type="text" name="duration_exam" pattern="\d{2}:\d{2}" placeholder="HH:MM" value="{{ old('duration_exam', $examexamconfig->duration_exam ?? '' ) }}" id="duration_exam" class="@error('duration_exam') is-invalid @enderror form-control" required>
@error('duration_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<br>

<div class="row">
<div class="col-2">
<label for="num_questions_exam">Qtd. de Questões : </label>
</div>
<div class="col-1">
<input type="number" name="num_questions_exam" value="{{ old('num_questions_exam', $examexamconfig->num_questions_exam ?? '' ) }}" id="num_questions_exam" class="@error('num_questions_exam') is-invalid @enderror form-control" required>
@error('num_questions_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<hr>
<div class="row">
<div class="col-3 d-flex justify-content-center">
Download de Prova
</div>
</div>

<br>

<div class="row">
<div class="col-1">
<label for="time_start_download_exam">Início : </label>
</div>
<div class="col-2">
<input type="time" name="time_start_download_exam" value="{{ old('time_start_download_exam', $examexamconfig->time_start_download_exam ?? '' ) }}" id="time_start_download_exam" class="@error('time_start_download_exam') is-invalid @enderror form-control" required>
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
<label for="time_end_download_exam">Término : </label>
</div>
<div class="col-2">
<input type="time" name="time_end_download_exam" value="{{ old('time_end_download_exam', $examexamconfig->time_end_download_exam ?? '' ) }}" id="time_end_download_exam" class="@error('time_end_download_exam') is-invalid @enderror form-control" required>
@error('time_end_download_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<hr>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.registration') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Próximo</button>
</div> 
</div>

</fom>
@endsection