@extends('layout.layout')

@section('content')
<label>Insira o mesmo e-mail utilizado durante sua inscrição</label>
<table border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td><form action="" method="post" enctype="multipart/form-data" id="form" name="form">
      <input type="email" name="form[email]" id="form[email]" required>
      <input name="bt_enviarRedefinirSenha" type="submit" id="bt_enviarRedefinirSenha" value="Enviar">
    </form></td>
    <td><form method="post" enctype="multipart/form-data">
      <input name="bt_voltar" type="submit" id="bt_voltar" value="Login">
    </form></td>
  </tr>
</table>
@endsection