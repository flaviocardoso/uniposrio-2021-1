@extends('layout.layout')

@section('content')
<!-- não é inscrição é só login -->
<div align="center">
    <form action="" method="post" enctype="multipart/form-data">
        <table border="0" cellspacing="5">
          <tr>
            <td align="center"><b>Particitantes</b></td>
          </tr>
          <tr>
            <td>
            	<input name="loginDiscente" type="text" id="loginDiscente" onFocus="this.value='';" onBlur="if(this.value=='')this.value='login';" value="Usuário/Login" size="29">
                <!--<input name="loginDiscente" type="text" id="loginDiscente" placeholder="login" size="29" required>-->
            </td>
            </tr>
          <tr>
            <td>
            	<input name="senhaDiscente" type="password" id="senhaDiscente" onFocus="this.value=''; this.type='password'" onBlur="if(this.value==''){this.type='text';this.value='senha';}" placeholder="senha/Password" size="29">
                <!--<input name="senhaDiscente" type="password" id="senhaDiscente" placeholder="senha" size="29" required>-->
            </td>
            </tr>
          <tr>
            <td align="center"><input name="bt_entrar" type="submit" id="bt_entrar" value="Entrar">
              <br>
            <em>login</em></td>
          </tr>
          <tr>
            <td align="left">
            <hr>
              <input name="bt_novaInscricao" type="submit" id="bt_novaInscricao" value="Cadastre-se">
              <em>Register</em>
              <br>
              <input name="bt_redefinirSenha" type="submit" id="bt_redefinirSenha" value="Redefinir Senha">
            <em>Change Password </em></td>
          </tr>
        </table>
    </form>
</div>
@endsection