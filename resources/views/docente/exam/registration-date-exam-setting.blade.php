@extends('layout.layout')

@section('content')
<table>
<tr>
<td colspan="2" class="separadorVertical">
Definições da Prova
</td>
</tr>
<tr><!-- inscrições -->
<td>
<label>Data das Inscrições</label>
</td>
<td>
<input name="formDadosDoExame[dt_ini_insc]" type="date" required class="inicio">
<label>à</label>
<input name="formDadosDoExame[dt_fim_insc]" type="date" required class="fim"></td>
</tr>
</table>
@endsection