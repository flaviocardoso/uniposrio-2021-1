@extends('layout.layout')

@section('content')

<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
</tr>
<tr>
<td colspan="2" class="separadorVertical">
Perido de Prova
</td>
</tr>
<tr><!-- semestre e ano -->
<td colspan="2">
<label>Ano</label>
<input type="" name="formDadosDoExame[ano_insc]" min="2010" max="2100" size="2" required>
<label>Semestre</label>
<input type="number" name="formDadosDoExame[semestre_insc]" min="1" max="2" step="1" size="1" required>
<hr>
</td>
</tr><!-- fim -->
<tr><!-- situação -->
<td>
<label>Situação</label>
</td>
<td>
<input type="radio" name="formDadosDoExame[status]" value="A" checked>
<label>Ativo</label>
<input type="radio" name="formDadosDoExame[status]" value="I">
<label>Inativo (é preciso SALVAR para tornar ativo)</label>
</td>
</tr><!-- fim -->
</table>
@endsection