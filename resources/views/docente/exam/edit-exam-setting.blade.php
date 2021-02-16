@extends('layout.layout')

@section('content')

<div class="row mb-2">
<div class="col">
Edite Definições de Prova
</div>
</div>

<hr>
<div class="row mb-2">
<div class="col">
Periodo de Prova : ( {{ $periodConfig->ano ?? '' }}.{{ $periodConfig->semestre ?? '' }} )
</div>
</div>

<form method="post">
@csrf
@method('put')

<hr>
<div id="activeexam" class="row mb-2">
<div class="col-1">
Situação
</div>
</div>
@if (session('active_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('active_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="form-check">
<input class="form-check-input" type="radio" id="activetrueexam" name="activeexam" value="1"  @isset($periodConfig->active) @if ($periodConfig->active) checked @endif @else checked @endisset >
<label class="form-check-label" for="activetrueexam">
Ativo
</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" id="activefalseexam" name="activeexam" value="0" @isset($periodConfig->active) @if (!$periodConfig->active) checked @endif @else @endif >
<label class="form-check-label" for="activefalseexam">
Inativo
</label>
@error('activeexam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="active_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>

<div id="registre_exam" class="row mb-3">
<div class="col-3">
Data das Inscrições
</div>
</div>
@if (session('registre_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('registre_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="row mb-2">
<div class="col-1">
<label for="startregistrationexam">Início : </label>
</div>
<div class="col-2">
<input type="date" name="date_register_start" value="{{ old('date_register_start', $registrationConfig->start ?? '') }}" id="startregistrationexam" class="@error('date_register_start') is-invalid @enderror form-control" >
@error('date_start_register')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<p></p>

<div class="row mb-2">
<div class="col-1">
<label for="endregistrationexam">Término : </label>
</div>
<div class="col-2">
<input type="date" name="date_register_end" value="{{ old('date_register_end', $registrationConfig->end ?? '') }}" id="endregistrationexam" class="@error('date_register_end') is-invalid @enderror form-control" >
@error('date_register_end')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="registre_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>
<div id="prova_exam" class="row mb-3">
<div class="col-4">
Prova
</div>
</div>
@if (session('prova_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('prova_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="form-group mb-2">
<div class="row mb-2">
<div class="col-2">
<label>Data : </label>
</div>
<br>
<div class="col-2">
<input name="date_exam" type="date" value="{{ old('date_exam', $examConfig->date_exam ?? '') }}" class="@error('date_exam') is-invalid @enderror form-control" >
@error('date_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>
<div class="form-group">
<div class="row mb-2">
<div class="col-2">
<label for="">Hora de Início : </label>
</div>
<div class="col-2">
<input type="time" name="time_start_exam" value="{{ old('time_start_exam', $examConfig->time_start_exam ?? '' ) }}" id="date_review" class="@error('time_start_exam') is-invalid @enderror form-control" >
@error('time_start_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<div class="row mb-2">
<div class="col-2">
<label for="duration_exam">Duração (HH:MM) : </label>
</div>
<div class="col-2">
<input type="text" name="duration_exam" pattern="\d{2}:\d{2}" placeholder="HH:MM" value="{{ old('duration_exam', $examConfig->duration_exam ?? '' ) }}" id="duration_exam" class="@error('duration_exam') is-invalid @enderror form-control" >
@error('duration_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

<div class="row mb-2">
<div class="col-2">
<label for="num_questions_exam">Qtd. de Questões : </label>
</div>
<div class="col-1">
<input type="number" name="num_questions_exam" value="{{ old('num_questions_exam', $examConfig->num_questions_exam ?? '' ) }}" id="num_questions_exam" class="@error('num_questions_exam') is-invalid @enderror form-control" >
@error('num_questions_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="prova_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>
<div id="download_exam" class="row mb-3">
<div class="col-3">
Download de Prova
</div>
</div>
@if (session('download_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('download_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="row mb-2">
<div class="col-1">
<label for="time_start_download_exam">Início : </label>
</div>
<div class="col-2">
<input type="time" name="time_start_download_exam" value="{{ old('time_start_download_exam', $examConfig->time_start_download_exam ?? '' ) }}" id="time_start_download_exam" class="@error('time_start_download_exam') is-invalid @enderror form-control" >
@error('time_start_download_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="row mb-2">
<div class="col-1">
<label for="time_end_download_exam">Término : </label>
</div>
<div class="col-2">
<input type="time" name="time_end_download_exam" value="{{ old('time_end_download_exam', $examConfig->time_end_download_exam ?? '' ) }}" id="time_end_download_exam" class="@error('time_end_download_exam') is-invalid @enderror form-control" >
@error('time_end_download_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="download_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>
<div id="result_exam" ></div>
@if (session('result_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('result_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="form-group">

<div class="row mb-2">
<div class="col-2">
<label for="date_solicitation_exam">Data de Solicitação : </label>
</div>
<div class="col-2">
<input name="date_solicitation_exam" type="date" value="{{ old('date_solicitation_exam', $examConfig->date_solicitation_exam ?? '') }}" id="date_solicitation_exam" class="@error('date_solicitation_exam') is-invalid @enderror form-control" >
@error('date_solicitation_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>

<div class="form-group">

<div class="row mb-3">
<div class="col-2">
<label>Data de Resultado : </label>
</div>
<div class="col-2">
<input name="date_result_exam" type="date" value="{{ old('date_result_exam', $examConfig->date_result_exam ?? '') }}" class="@error('date_result_exam') is-invalid @enderror form-control" >
@error('date_result_exam')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>

</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="result_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>

<div id="review_exam" class="row mb-3">
<div class="col-3">
Data de Revisão
</div>
</div>
@if (session('review_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('review_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="form-group">
<div class="row mb-2">
<div class="col-1">
<label for="date_review">Data : </label>
</div>
<div class="col-2">
<input type="date" name="date_review" value="{{ old('date_review', $examConfig->date_review ?? '') }}" id="date_review" class="@error('date_review') is-invalid @enderror form-control" >
@error('date_review')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="row mb-2">
<div class="col-1">
<label for="time_review">Hora : </label>
</div>
<div class="col-2">
<input type="time" name="time_review" value="{{ old('time_review', $examConfig->time_review ?? '') }}" id="time_review" class="@error('time_review') is-invalid @enderror form-control" >
@error('time_review')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="review_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>
<div id="interview_exam" class="row mb-3">
<div class="col-3">
<label>Data de Intrevista</label>
</div>
</div>
@if (session('interview_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('interview_exam') ?? '' }}
</div>
</div>
</div>
@endif
<div class="form-group">
<div class="row mb-2">
<div class="col-1">
<label for="start">Inicio : </label>
</div>
<div class="col-2">
<input type="date" name="date_interview_start" value="{{ old('date_interview_start', $interviewConf->start ?? '') }}" id="start" class="@error('date_interview_start') is-invalid @enderror form-control" >
@error('date_interview_start')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="row mb-2">
<div class="col-1">
<label for="end">Terminino : </label>
</div>
<div class="col-2">
<input type="date" name="date_interview_end" value="{{ old('date_interview_end', $interviewConf->end ?? '') }}" id="end" class="@error('date_interview_end') is-invalid @enderror form-control" >
@error('date_interview_end')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="interview_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>
<div id="mestrado_exam" class="row mb-3">
<div class="col">
Ponto de Corte | Mestrado
</div>
</div>
@if (session('mestrado_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('mestrado_exam') ?? '' }}
</div>
</div>
</div>
@endif
@for ($i=0; $i < count($passingscoreMConf->instituions); $i++)
<div class="row mb-2">
<div class="col-1">
<input type="number" name="instituionsM[{{ $i }}][nota]" value="{{ $passingscoreMConf->instituions[$i]['nota'] ?? 10.00 }}" min="0.00" max="10.00" step="0.05" class="form-control" >
</div>
<div class="col-5">
<label>{{ $passingscoreMConf->instituions[$i]['sigla'] }} - {{ $passingscoreMConf->instituions[$i]['nome'] }}</label>
</div>
<div class="col-1">
<input type="hidden" name="instituionsM[{{ $i }}][sigla]" value="{{ $passingscoreMConf->instituions[$i]['sigla'] }}" class="form-control" >
</div>
<div class="col-1">
<input type="hidden" name="instituionsM[{{ $i }}][nome]" value="{{ $passingscoreMConf->instituions[$i]['nome'] }}" class="form-control" >
</div>
</div>
@endfor
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="mestrado_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>

<div id="doutorado_exam" class="row mb-3">
<div class="col">
Ponto de Corte | Doutorado
</div>
</div>
@if (session('doutorado_exam'))
<div class="row mb-2">
<div class="col">
<div class="alert alert-success">
{{ session('doutorado_exam') ?? '' }}
</div>
</div>
</div>
@endif
@for ($i=0; $i < count($passingscoreDConf->instituions); $i++)
<div class="row mb-2">
<div class="col-1">
<input type="number" name="instituionsD[{{ $i }}][nota]" value="{{ $passingscoreDConf->instituions[$i]['nota'] ?? 10.00 }}" min="0.00" max="10.00" step="0.05" class="form-control" >
</div>
<div class="col-5">
<label>{{ $passingscoreDConf->instituions[$i]['sigla'] }} - {{ $passingscoreDConf->instituions[$i]['nome'] }}</label>
</div>
<div class="col-1">
<input type="hidden" name="instituionsD[{{ $i }}][sigla]" value="{{ $passingscoreDConf->instituions[$i]['sigla'] }}" class="form-control" >
</div>
<div class="col-1">
<input type="hidden" name="instituionsD[{{ $i }}][nome]" value="{{ $passingscoreDConf->instituions[$i]['nome'] }}" class="form-control" >
</div>
</div>
@endfor
</div>
<div class="d-flex justify-content-end">
<button type="submit" name="update_exam" value="doutorado_exam" class="btn btn-primary">Atualizar</button>
</div> 
</div>
<hr>


</form>

@endsection