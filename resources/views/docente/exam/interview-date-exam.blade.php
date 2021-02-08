@extends('layout.layout')

@section('content')
<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
<tr>
<td>
<label>Data da Entrevista</label>
</td>
<td><!-- data de entrevista -->
<input type="date" name="formDadosDoExame[dt_ini_entr]" required class="inicio">
<label>à</label>
<input type="date" name="formDadosDoExame[dt_fim_entr]" required class="fim">
</td><!-- fim -->
</tr>
</table>
@endsection