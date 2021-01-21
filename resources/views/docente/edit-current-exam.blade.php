@extends('layout.layout')

@section('content')
<fieldset><legend>Definições da Prova</legend>
<table>
    <tr>
        <td>
            <label>Situação</label>
        </td>
        <td>
            <input type="radio" name="formDadosDoExame[status]" value="A"><label>Ativo</label>
            <input type="radio" name="formDadosDoExame[status]" value="I">
            <label>Inativo (é preciso SALVAR para alterar o estado)</label>
        </td>
    </tr>
    <tr>
        <td><label>Data das Inscrições</label></td>
        <td>
        <input name="formDadosDoExame[id_dados]" type="hidden" value="">
        <input name="formDadosDoExame[dt_ini_insc]" type="date" required value="" class="inicio">
        <label>à</label>
        <input name="formDadosDoExame[dt_fim_insc]" type="date" required value="" class="fim"></td>
    </tr>
    <tr>
        <td><label>Data da Prova</label></td>
        <td><input name="formDadosDoExame[dt_prova]" type="date" required value="">
       
    </tr>
    <tr>
        <td><label>Data da Entrevista</label></td>
        <td>
        <input type="date" name="formDadosDoExame[dt_ini_entr]" required value="" class="inicio">
        <label>à</label><input type="date" name="formDadosDoExame[dt_fim_entr]" required value="" class="fim"></td>
    </tr>
</table>
</fieldset>
<fieldset><legend>Ponto de Corte | Mestrado</legend>
<table>

    <tr>
        <td>
        <input type="hidden" name="" value="">
        <input type="hidden" name="" value="">
        <input type="number" name="" min="0.00" max="10.00" step="0.01" required value="" size="4">
        </td>
        <td></td>
    </tr>
    
</table>
</fieldset>
<fieldset><legend>Ponto de Corte | Doutorado</legend>
<table>
    <tr>
        <td>
        <input type="hidden" name="" value="">
        <input type="hidden" name="" value="">
        <input type="number" name="" min="0.00" max="10.00" step="0.01" required value="" size="4">
        </td>
        <td><td>
    </tr>
    
</table>
</fieldset>
<input name="bt_salvarDadosDoExame" type="submit" value="Salvar">

@endsection