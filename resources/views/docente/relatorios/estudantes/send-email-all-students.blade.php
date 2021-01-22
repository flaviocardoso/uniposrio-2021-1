@extends('layout.layout')

@section('content')
<<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Enviar Mensagem</legend>
    <input name="docente[assunto]" type="text" value="<?=$assunto?>" size="92" readonly /><br/>
        <textarea name="docente[mensagem]" cols="70" rows="30" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" readonly ><?=$conteudo?></textarea><br/><br/>
        <input name="sendAll[all]" type="submit" value="Enviar"><input name="" type="submit" value="Voltar">
    </fieldset>
</form>
@endsection