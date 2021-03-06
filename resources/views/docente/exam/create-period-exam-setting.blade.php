@extends('layout.layout')

@section('content')
@if ($errorperiod)
    <div class="alert alert-danger">
        {{ $errorperiod }}
    </div>
@endif
<form method="post">
@csrf
<div class="row">
<div class="col">
Definições da Prova
</div>
</div>

<hr>

<div class="row">
<div class="col-2 d-flex justify-content-center">
Periodo de Prova
</div>
</div>

<br>

<div class="form-group">

<div class="row">
<div class="col-1">
<label for="anoexam">Ano : </label>
</div>
<div class="col-1">
<input type="number" name="ano" value="{{ old('ano', $examperiodconfig->ano ?? '') }}" id="anoexam" min="{{ date('Y') }}" max="2100" size="2" class="@error('ano') is-invalid @enderror form-control" required>
@error('ano')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<input type="hidden" name="registro" value="UNIPOSRIO" required>

<p></p>

<div class="row">
<div class="col-1">
<label for="semestreexam">Semestre : </label>
</div>
<div class="col-1">
<input type="number" name="semestre" value="{{ old('semestre', $examperiodconfig->semestre ?? '') }}" id="semestreexam" min="1" max="2.9" step="0.5" class="@error('semestre') is-invalid @enderror form-control" required>
@error('semestre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<hr>

<div class="row">
<div class="col-1 d-flex justify-content-center">
Situação
</div>
</div>

<br>

<div class="form-check">
<input class="form-check-input" type="radio" id="activetrueexam" name="active" value="1"  @isset($examperiodconfig->active) @if ($examperiodconfig->active) checked @endif @else checked @endisset >
<label class="form-check-label" for="activetrueexam">
Ativo
</label>
</div>

<div class="form-check">
<input class="form-check-input" type="radio" id="activefalseexam" name="active" value="0" @isset($examperiodconfig->active) @if (!$examperiodconfig->active) checked @endif @else @endif >
<label class="form-check-label" for="activefalseexam">
Inativo
</label>
@error('active')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<hr>

<div class="d-flex justify-content-end">
<button type="submit" class="btn btn-primary">Próximo</button>
</div>
<!-- <div class="d-flex justify-content-between">
<button type="button" class="btn btn-primary">Anterior</button>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
</div> -->
</form>
@endsection