@extends
('layout.layout')

@section('content')
<div align="center">
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0" cellspacing="5">
          <tr>
            <td align="center"><b>Colaborador</b></td>
          </tr>
          <tr>
            <td><input name="loginDocente" type="text" id="loginDocente" placeholder="Usuário/Login" size="29" autocomplete="off"></td>
            </tr>
          <tr>
            <td><input name="senhaDocente" type="password" id="senhaDocente" placeholder="senha/Password" size="29" autocomplete="off"></td>
            </tr>
          <tr>
            <td align="center"><input name="bt_entrar" type="submit" id="bt_entrar" value="Entrar">
            <em>Login</em></td>
            </tr>
          <tr>
            <td align="left">
            <hr>
              <input name="bt_novaInscricao" type="submit" id="bt_novaInscricao" value="Cadastre-se">
              <em>Register</em><br>
<input name="bt_redefinirSenha" type="submit" id="bt_redefinirSenha" value="Redefinir Senha">
<em>Change Password</em>
              </td>
          </tr>
        </table>
    </form>
</div>
@endsection