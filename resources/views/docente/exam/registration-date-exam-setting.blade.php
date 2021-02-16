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
Data das Inscrições
</div>
</div>

<br>

<div class="form-group">

<div class="row">
<div class="col-1">
<label for="startregistrationexam">Início : </label>
</div>
<div class="col-2">
<input type="date" name="start" value="{{ old('start', $examregistrationconfig->start ?? '') }}" id="startregistrationexam" class="@error('start') is-invalid @enderror form-control" required>
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
<label for="endregistrationexam">Término : </label>
</div>
<div class="col-2">
<input type="date" name="end" value="{{ old('end', $examregistrationconfig->end ?? '') }}" id="endregistrationexam" class="@error('end') is-invalid @enderror form-control" required>
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
<a href="{{ route('collaborator.dashboard.new.exam.period') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Próximo</button>
</div> 
</div>
</form>
@endsection