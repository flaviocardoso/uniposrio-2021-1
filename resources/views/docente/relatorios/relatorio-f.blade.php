@extends('layout.layout')

@section('content')
<select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_visualizarDadosAlunos.php', 'visuDadosAlunos'); document.getElementById('idExame').value=this.value;" required>
    
</select>
<?php
//  $instParicipantes = isset($_REQUEST['relatorio'])?$_REQUEST['relatorio']['instPart']:'';
//  $programa = isset($_REQUEST['relatorio'])?$_REQUEST['relatorio']['programa']:'';
?>
<select name="relatorio[instPart]">
	<option value="%%">Todas</option>
    <option value="CBPF" >CBPF</option>
    <option value="UERJ" >UERJ</option>
    <option value="UFF" >UFF</option>
    <option value="UFRJ" >UFRJ</option>
    <option value="PUC-RIO" >PUC_RIO</option>
    <!--<option value="UFV" >UFV</option>-->
</select>
<select name="relatorio[programa]">
	<option value="%%">Todas</option>
    <option value="M" >Mestrado</option>
    <option value="D" >Doutorado</option>
</select>
<input type="hidden" name="mod" value="bt_modF" />
<input type="submit" name="bt_relatorio_F" value="Gerar Relatório">
<input type="submit" name="bt_relatorioPDF_F" value="Gerar PDF">

@endsection