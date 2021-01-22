@extends('layout.layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Enviar Mensagem para todos os candidatos</legend>
			
<select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_visualizarDadosAlunos.php', 'visuDadosAlunos'); document.getElementById('idExame').value=this.value;" required>
    <?php foreach($anosSemestres as $chave => $valor){ 
    echo "<option value='$chave'";
    if($chave==$remember['exame']){echo'selected';} 
    echo ">$valor</option>";
     } ?>
</select>
<?php
//  $instParicipantes = isset($_REQUEST['relatorio'])?$_REQUEST['relatorio']['instPart']:'';
//  $programa = isset($_REQUEST['relatorio'])?$_REQUEST['relatorio']['programa']:'';
?>
<select name="relatorio[instPart]">
	<option value="0">Selecione a instituição</option>
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

        <input name="subject" type="text" size="92" placeholder="Assunto/Subject"/><br/>
        <fieldset><legend>Anexar arquivo/Attachment file</legend>
            <input name="file" type="file" placeholder="Anexar arquivo/Attachment file"/><br/>
        </fieldset>
        <textarea name="mensagem" cols="70" rows="15" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" placeholder="Mensagem/message"></textarea><br/>
		
		<input type="hidden" name="mod" value="bt_modI" />
        <input name="sendmsg" type="submit" value="Enviar">Send
    </fieldset>
</form>
@endsection