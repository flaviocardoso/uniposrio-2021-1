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
<div class="col-3 d-flex justify-content-center">
<label>Data de Intrevista</label>
</div>
</div>

<br>

<div class="form-group">
<div class="row">
<div class="col-1">
<label for="start">Inicio : </label>
</div>
<div class="col-2">
<input type="date" name="start" value="{{ old('start', $interviewexamconfig->start ?? '') }}" id="start" class="@error('start') is-invalid @enderror form-control" required>
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
<label for="end">Terminino : </label>
</div>
<div class="col-2">
<input type="date" name="end" value="{{ old('end', $interviewexamconfig->end ?? '') }}" id="end" class="@error('end') is-invalid @enderror form-control" required>
@error('end')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>

<hr>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.complement') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Próximo</button>
</div> 
</div>

</form>
@endsection