@extends('layout.layout')

@section('content')
<form method="post">
@csrf
<div class="col">
Definições da Prova
</div>
</div>

<br>

<div class="row">
<div class="col">
Ponto de Corte | Mestrado
</div>
</div>
<br>
<div class="row">
<div class="col-1">
<label for="endregistrationexam">Terminino</label>
</div>
<div class="col-2">
<input type="date" name="instituionsM[nota]" value="10.00" min="0.00" max="10.00" step="0.05" required>
</div>
<div class="col-2">
<input type="date" name="instituionsM[sigla]" value="" disabled required>
</div>
<div class="col-2">
<input type="date" name="instituionsM[instituion]" value="" disabled required>
</div>
</div>
</div>

<hr>

<div class="row">
<div class="col">
Ponto de Corte | Mestrado
</div>
</div>
<br>
<div class="row">
<div class="col-1">
<label for="endregistrationexam">Terminino</label>
</div>
<div class="col-2">
<input type="date" name="instituionsD[nota]" value="10.00" min="0.00" max="10.00" step="0.05" required>
</div>
<div class="col-2">
<input type="date" name="instituionsD[sigla]" value="" disabled required>
</div>
<div class="col-2">
<input type="date" name="instituionsD[instituion]" value="" disabled required>
</div>
</div>
</div>

<br>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.interview') }}" class="btn btn-danger">Anterior</a>
<button type="button" class="btn btn-primary">Próximo</button>
</div> 
<!-- $table->integer('module');
            $table->json('instituions'); -->

</form>
@endsection