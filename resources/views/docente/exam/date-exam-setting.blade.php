@extends('layout.layout')

@section('content')
<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
</tr>
<tr><!-- prova -->
<td>
<label>Data da Prova</label>
</td>
<td>
<input name="formDadosDoExame[dt_prova]" type="date" required>
<label>Hora Início</label>
<input name="formDadosDoExame[hr_ini_prova]" type="time" required>
<label>Duração</label>
<input name="formDadosDoExame[duracao_prova]" type="time" required>
<label>Quantidade de Questões</label>
<input name="formDadosDoExame[qtd_questoes]" type="number" min="1" max="8" step="1" placeholder="-" required size="2">
</td>
</tr><!-- fim -->
</table>
@endsection