@extends('layout.layout')

@section('content')
<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
</tr>
<tr><!-- solicitação -->
<td>
<label>Data de Solicitação</label>
</td>
<td>
<input name="formDadosDoExame[dt_solicitacao]" type="date" required>
</td>
</tr><!-- fim -->
</table>
@endsection