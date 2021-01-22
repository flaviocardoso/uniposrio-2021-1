@extends('layout.layout')

@section('content')
<fieldset><legend>Envio de Mensagem</legend>
  <input name="docente[nome_usuario]" type="text" id="docente[nome_usuario]" value="" size="50" readonly>
  <input name="docente[email_usuario]" type="text" id="docente[email_usuario]" value="" size="24" readonly><br>
  <textarea name="docente[mensagem]" cols="70" rows="20" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" required></textarea><br>
  <label id="saidaTextAreaLimite"> </label><br>
  <input name="Email[]" type="submit" value="Enviar"><input name="" type="submit" value="Voltar">
</fieldset>
@endsection