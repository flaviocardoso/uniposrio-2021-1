@extends('layout.layout')

@section('content')
<div class="row">
<div class="col">
Definições da Prova
</div>
</div>

<br>

<div class="form-group">

<div class="row">
<div class="col-1">
<label for="date_solicitation_exam">Data de Solicitação</label>
</div>
<div class="col-4">
<input name="date_solicitation_exam" type="date" id="date_solicitation_exam" class="@error('date_solicitation_exam') is-invalid @enderror" required>
@error('date_solicitation_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<hr>

<div class="form-group">

<div class="row">
<div class="col-1">
<label>Data de Resultado</label>
</div>
<div class="col-4">
<input name="date_result_exam" type="date" class="@error('date_result_exam') is-invalid @enderror" required>
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
<div class="col">
Data de Revisão
</div>
</div>

<br>

<div class="form-group">
<div class="row">
<div class="col-1">
<label for="date_review">Data</label>
</div>
<div class="col-4">
<input type="date" name="date_review" value="{{ $examregistrationconfig->date_review ?? '' }}" id="date_review" class="@error('date_review') is-invalid @enderror" required>
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
<label for="time_review">Hora</label>
</div>
<div class="col-4">
<input type="time" name="time_review" value="{{ $examregistrationconfig->time_review ?? '' }}" id="time_review" class="@error('time_review') is-invalid @enderror" required>
@error('time_review')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>

<br>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.exam') }}" class="btn btn-danger">Anterior</a>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
</div>


@endsection