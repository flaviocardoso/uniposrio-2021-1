@extends('layout.layout')

@section('content')
<fieldset><legend>Envio de Mensagem</legend>
  <textarea name="docente[mensagem]" cols="70" rows="20" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" required></textarea><br>
  <input name="sendEmailAll" type="submit" value="Enviar"><input name="" type="submit" value="Voltar">
</fieldset>
@endsection