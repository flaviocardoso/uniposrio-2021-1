@extends('layout.layout')

@section('content')
@foreach ($participation_instituions as $participation_instituion)
@if ($participation_instituion->module)
<p>
@if ($participation_instituion->module == 'M') 
<a href="{{ route('collaborator.participation.instituion.update', $participation_instituion->id) }}">MESTRADO </a>
@endif
@if ($participation_instituion->module == 'D') 
<a href="{{ route('collaborator.participation.instituion.update', $participation_instituion->id) }}">DOUTORADO</a>
@endif
</p>
<table class='table'>
<tbody>
@foreach ($participation_instituion->instituions as $instituion)

<tr>
<td>{{ $instituion['sigla'] ?? '' }}</td>
<td>{{ $instituion['nome'] ?? '' }}</td>
</tr>

@endforeach
@endif
</tbody>
</table>
@endforeach
@endsection