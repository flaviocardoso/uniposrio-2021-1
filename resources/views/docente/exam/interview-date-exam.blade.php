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
<label for="date_review">Data de Intrevista</label>
</div>
</div>

<br>

<div class="form-group">
<div class="row">
<div class="col-1">
<label for="date_review">Inicio</label>
</div>
<div class="col-4">
<input type="date" name="start" value="{{ $examregistrationconfig->date_review ?? '' }}" id="start" class="@error('start') is-invalid @enderror" required>
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
<label for="end">Terminino</label>
</div>
<div class="col-4">
<input type="date" name="end" value="{{ $examregistrationconfig->time_review ?? '' }}" id="end" class="@error('end') is-invalid @enderror" required>
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
<a href="{{ route('collaborator.dashboard.new.exam.complement') }}" class="btn btn-danger">Anterior</a>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
</div>

</form>
@endsection