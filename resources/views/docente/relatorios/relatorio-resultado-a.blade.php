@extends('layout.layout')

@section('content')
<table class="tabelaCoresVerticais" width="100%">
    <tr>
        <td align="center"><strong>Nome</strong></td>
        <td align="center"><strong>E-mail</strong></td>
        <td align="center"><strong>Pais</strong></td>
        <td align="center"><strong>estado</strong></td>
        <td align="center"><strong>Cidade</strong></td>
        <td align="center"><strong>Programa</strong></td>
    </tr>
    <tr>
        <td><strong>Teste</strong></td>
        <td align="center">teste@teste.com</td>
        <td align="center">Brasil</td>
        <td align="center">RJ</td>
        <td align="center">RJ</td>
        <td align="center">Nada</td>
    </tr>
    <tr align="center">
        <td colspan="6">Total de inscrito(s): <strong>1</strong></td>
    </tr>
</table>
@endsection