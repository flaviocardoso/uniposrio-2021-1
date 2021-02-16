@extends('layout.layout')

@section('content')
<form method="post">
@csrf
<div class="col">
Definições da Prova
</div>
</div>

<hr>

<div class="row">
<div class="col">
Ponto de Corte | Mestrado
</div>
</div>
<br>
@for ($i=0; $i < count($instituionsmestrado); $i++)
<div class="row">
<div class="col-1">
<input type="number" name="instituionsM[{{ $i }}][nota]" value="{{ $passingscoreMexamconfig->instituions[$i]['nota'] ?? 10.00 }}" min="0.00" max="10.00" step="0.05" class="form-control" required>
</div>
<div class="col-5">
<label>{{ $instituionsmestrado[$i]['sigla'] }} - {{ $instituionsmestrado[$i]['nome'] }}</label>
</div>
<div class="col-1">
<input type="hidden" name="instituionsM[{{ $i }}][sigla]" value="{{ $instituionsmestrado[$i]['sigla'] }}" class="form-control" required>
</div>
<div class="col-1">
<input type="hidden" name="instituionsM[{{ $i }}][nome]" value="{{ $instituionsmestrado[$i]['nome'] }}" class="form-control" required>
</div>
</div>
<br>
@endfor
</div>

<hr>

<div class="row">
<div class="col">
Ponto de Corte | Doutorado
</div>
</div>
<br>
@for ($i=0; $i < count($instituionsdoutorado); $i++)
<div class="row">
<div class="col-1">
<input type="number" name="instituionsD[{{ $i }}][nota]" value="{{ $passingscoreDexamconfig->instituions[$i]['nota'] ?? 10.00 }}" min="0.00" max="10.00" step="0.05" class="form-control" required>
</div>
<div class="col-5">
<label>{{ $instituionsmestrado[$i]['sigla'] }} - {{ $instituionsmestrado[$i]['nome'] }}</label>
</div>
<div class="col-1">
<input type="hidden" name="instituionsD[{{ $i }}][sigla]" value="{{ $instituionsdoutorado[$i]['sigla'] }}" class="form-control" required>
</div>
<div class="col-1">
<input type="hidden" name="instituionsD[{{ $i }}][nome]" value="{{ $instituionsdoutorado[$i]['nome'] }}" class="form-control" required>
</div>
</div>
<br>
@endfor
</div>

<hr>

<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.interview') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Próximo</button>
</div> 

</form>
@endsection