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

<div class="form-group">

<div class="row">
<div class="col-2">
<label for="date_solicitation_exam">Data de Solicitação : </label>
</div>
<div class="col-2">
<input name="date_solicitation_exam" type="date" value="{{ old('date_solicitation_exam', $examexamconfig->date_solicitation_exam ?? '') }}" id="date_solicitation_exam" class="@error('date_solicitation_exam') is-invalid @enderror form-control" required>
@error('date_solicitation_exam')
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
<label>Data de Resultado : </label>
</div>
<div class="col-2">
<input name="date_result_exam" type="date" value="{{ old('date_result_exam', $examexamconfig->date_result_exam ?? '') }}" class="@error('date_result_exam') is-invalid @enderror form-control" required>
@error('date_result_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<hr>

<div class="row">
<div class="col-3 d-flex justify-content-center">
Data de Revisão
</div>
</div>

<br>

<div class="form-group">
<div class="row">
<div class="col-1">
<label for="date_review">Data : </label>
</div>
<div class="col-2">
<input type="date" name="date_review" value="{{ old('date_review', $examexamconfig->date_review ?? '') }}" id="date_review" class="@error('date_review') is-invalid @enderror form-control" required>
@error('date_review')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<p></p>
<div class="row">
<div class="col-1">
<label for="time_review">Hora : </label>
</div>
<div class="col-2">
<input type="time" name="time_review" value="{{ old('time_review', $examexamconfig->time_review ?? '') }}" id="time_review" class="@error('time_review') is-invalid @enderror form-control" required>
@error('time_review')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>

<hr>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.exam') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Próximo</button>
</div> 
</div>

</form>
@endsection