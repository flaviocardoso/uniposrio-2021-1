@extends('layout.layout')

@section('content')
<form action="" method="post" enctype="multipart/form-data" name="form">
	<p>
      <span class="formElement" aria-label="Senha Atual">
          <input name="form[senhaAtual]" class="formElement" id="form[senhaAtual]" type="password" required placeholder="Senha Atual/Current Password" size="40">
      </span>
	</p>
    <p>
      <span class="formElement" aria-label="Nova Senha">
          <input name="form[senha_usuario]" class="formElement" type="password" required placeholder="Nova Senha/New Password" size="40">
      </span>
    </p>
    <p>
      <span class="formElement" aria-label="Repetir Nova Senha">
          <input name="form[confSenha]" class="formElement" type="password" required placeholder="Repetir Nova Senha/Enter New Password Again" size="40">
      </span>
      </p>
      <p>
      <input name="bt_trocarSenha" type="submit" value="Salvar"><em>Save</em>
      </p>
</form>