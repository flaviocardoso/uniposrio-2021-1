@extends('layout.layout')

@section('content')
<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
</tr>
<tr><!-- revisão -->
<td>
<label>Data Revisão</label>
</td>
<td>
<input name="formDadosDoExame[dt_revisao]" type="date" required>
<label>Hora Revisão</label>
<input name="formDadosDoExame[hr_revisao]" type="time" required>
</td>
</tr><!-- fim -->
</table>
@endsection