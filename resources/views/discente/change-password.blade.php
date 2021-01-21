@extends('layout.layout')

@section('content')
<form action="" method="post" enctype="multipart/form-data" name="form">
  <table border="0" cellpadding="0" cellspacing="5">
    <tr>
      <td><input name="form[senhaAtual]" id="form[senhaAtual]" type="password" required placeholder="Senha Atual/current password" size="40"></td>
    </tr>
    <tr>
      <td><input name="form[senha]" type="password" required placeholder="Nova Senha/new password" size="40"></td>
    </tr>
    <tr>
      <td><input name="form[confSenha]" type="password" required placeholder="Repetir Nova Senha/Confirm new password" size="40"></td>
    </tr>
    <tr>
      <td><input name="bt_trocarSenha" type="submit" value="Salvar"> <em>Save</em></td>
    </tr>
  </table>
</form>
<p>Dúvidas? Envie um e-mail para <a href="mailto:posgrad@cbpf.br">posgrad@cbpf.br</a>. </p>
<p>Problemas técnicos com sua senha? Envie um e-mail para <a href="mailto:web@cbpf.br">web@cbpf.br</a>. </p>
@endsection