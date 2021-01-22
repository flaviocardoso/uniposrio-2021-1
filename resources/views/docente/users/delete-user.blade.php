@extends('layout.layout')

@section('content')
    <p>Deseja realmente excluir <strong>{$resultado['nome_usuario']}</strong> do sistema?</p>
    <form action="" method="post" enctype="multipart/form-data" name="form_excluirUsuario">
    <input name="id_user" type="submit" id="bt_excluirUsuario" value="Sim">
    <input name="" type="submit" id="" value="Não">
</form>
@endsection