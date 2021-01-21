@extends('layout.layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Enviar Mensagem</legend>
        <input name="docente[nome_aluno]" type="text" id="docente[nome_aluno]" value="" size="50" readonly>
        <input name="docente[email_aluno]" type="text" id="docente[email_aluno]" value="" size="24" readonly><br>
        <textarea name="docente[mensagem]" cols="70" rows="20" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');"></textarea><br>
        <label id="saidaTextAreaLimite"> </label><br>
        <input name="email[<?php echo $idDoAluno; ?>]" type="submit" value="Enviar"><input name="" type="submit" value="Voltar">
    </fieldset>
</form>
@endsection