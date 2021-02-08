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
Ponto de Corte | Mestrado
</td>
</tr>
<tr><!-- notas de corte do mestrado -->
<td>
<input type="hidden" name="" value="">
<input type="number" name="" min="0.00" max="10.00" step="0.05" value="10.00" required size="4">
</td>
<td>
<strong><!-- sigla --></strong> - <!-- instituição -->
</td>
</tr>
<tr><!-- fim -->
<td colspan="2" class="separadorVertical">
Ponto de Corte | Doutorado
</td>
</tr>
<tr><!-- notas de corte do doutorado -->
<td>
<input type="hidden" name="" value="">
<input type="number" name="" min="0.00" max="10.00" step="0.05" value="10.00" required size="4">
</td>
<td>
<strong><!-- sigla --></strong> - <!-- instituição -->
</td>
</tr><!-- fim -->
</table>
@endsection