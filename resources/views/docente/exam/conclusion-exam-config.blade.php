@extends('layout.layout')

@section('content')
<div class="row">
<div class="col">
Definições de Prova
</div>
</div>
<br>
<div class="row">
    <div class="col">* Verifique as informaçoões e conclua a operação</div>
</div>

<hr>

<div class="row">
    <div class="col-5"> + Periodo de Prova : 
    ( {{ $examperiodconfig->ano ?? '' }}.{{ $examperiodconfig->semestre ?? '' }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Situação de Prova : 
    ( @if ($examperiodconfig->active) Ativo @else Inativo @endif )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Início de Inscrições de Prova : 
    ( {{ date('d/m/Y', strtotime($examregistrationconfig->start ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Términio de Inscrições de Prova : 
    ( {{ date('d/m/Y', strtotime($examregistrationconfig->end ?? '' )) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Prova : 
    ( {{ date('d/m/Y', strtotime($examexamconfig->date_exam ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Horário de Início de Prova : 
    ( {{ $examexamconfig->time_start_exam ?? '' }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Duração de Prova : 
    ( {{ $examexamconfig->duration_exam }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Quantidade de Questões de Prova : 
    ( {{ $examexamconfig->num_questions_exam ?? ' ' }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Horário de Início de Download de Prova : 
    ( {{ $examexamconfig->time_start_download_exam ?? '' }} )</div>
</div>
<div class="row"> 
    <div class="col-5"> + Horário de Términio de Download de Prova : 
    ( {{ $examexamconfig->time_end_download_exam ?? '' }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Solicitação de Prova : 
    ( {{ date('d/m/Y', strtotime($examexamconfig->date_solicitation_exam ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data do Resultado de Prova : 
    ( {{ date('d/m/Y', strtotime($examexamconfig->date_result_exam ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Revisão de Prova : 
    ( {{ date('d/m/Y', strtotime($examexamconfig->date_review ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Horário de Revisão de Prova : 
    ( {{ $examexamconfig->time_review ?? '' }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Data de Início de Intrevistas
    ( {{ date('d/m/Y', strtotime($interviewexamconfig->start ?? '')) }} )</div>
</div>
<div class="row">
    <div class="col-5"> + Date de Terminino de Intrevistas
    ( {{ date('d/m/Y', strtotime($interviewexamconfig->end ?? '')) }} )</div>
</div>

<hr>

<div class="row">
    <div class="col">Ponto de Corte</div>
</div>
<br>
<div class="row">
    <div class="col-5"> + Ponto de Corte | Mestrado</div>
</div>
<br>
@foreach($passingscoreMexamconfig->instituions as $passingscore)
<div class="row">
    <div class="col-5"> |  {{ $passingscore['sigla'] ?? ''}} - {{ $passingscore['nome'] }} : 
    ( {{ number_format($passingscore['nota'], 2, ',', '.') }} )</div>
</div>
@endforeach

<br>
<div class="row">
    <div class="col-5"> + Ponto de Corte | Mestrado</div>
</div>
<br>
@foreach($passingscoreDexamconfig->instituions as $passingscore)
<div class="row">
    <div class="col-5"> |  {{ $passingscore['sigla'] ?? ''}} - {{ $passingscore['nome'] }} : 
    ( {{ number_format($passingscore['nota'], 2, ',', '.') }} )</div>
</div>
@endforeach

<hr>

<form method="post">
@csrf 
<div class="d-flex justify-content-between">
<a href="{{ route('collaborator.dashboard.new.exam.passingscore') }}" class="btn btn-danger">Anterior</a>
<button type="submit" class="btn btn-primary">Concluir</button>
</div> 

</form>

@endsection