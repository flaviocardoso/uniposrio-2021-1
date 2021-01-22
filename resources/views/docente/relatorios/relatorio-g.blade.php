@extends('layout.layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Enviar Mensagem para todos os candidatos</legend>
        <input type="hidden" name="mod" value="bt_modG" />
        <input name="subject" type="text" size="92" placeholder="Assunto/Subject"/><br/>
        <fieldset><legend>Anexar arquivo/Attachment file</legend>
            <input name="file" type="file" placeholder="Anexar arquivo/Attachment file"/><br/>
        </fieldset>
        <textarea name="mensagem" cols="70" rows="15" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" placeholder="Mensagem/message"></textarea><br/>
        <input name="sendmsgall" type="submit" value="Enviar">Send
    </fieldset>
</form>
@endsection