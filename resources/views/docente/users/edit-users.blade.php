@extends('layout.layout')

@section('content')
<form action="" method="post" enctype="multipart/form-data" name="form_editarPermissoesUsuario">
          <p>Usuário: </p>
          <p>E-mail: </p>
          <p>Instituto: </p>
          <p>Departamento: </p>
          <p>Vínculo: </p>
          <fieldset><legend>Status e Permissões</legend>
          <input name="formUsuario[id_usuario]" type="hidden" value="">
          <input name="formUsuariosNivel[id_usuario]" type="hidden" value="">
          <input type="hidden" name="formUsuario[data_alteracao_usuario]" id="data_alteracao_usuario" value="">
          <table width="480" border="0" cellpadding="5" cellspacing="0" class="tabelaCoresVerticais">
            <tr>
              <td width="120" colspan="3" align="center">Status</td>
              <td width="120" colspan="3" align="center">Administrador</td>

              <td width="120" colspan="3" align="center">Comitê</td>
            </tr>
            <tr>
              <td align="center"></td>
              <td align="center"><input type="range" name="formUsuario[status_usuario]" min="0" max="1" style="width:40px;" value=""></td>
              <td align="center"></td>
              
              
              <td align="center"></td>
              <td align="center"><input type="range" name="formUsuariosNivel[administrador]" min="0" max="1" style="width:40px;" step="1" value=""></td>
              <td align="center"></td>
              
              <td align="center"></td>
              <td align="center"><input type="range" name="formUsuariosNivel[comite]" min="0" max="4" style="width:40px;" step="4" value=""></td>
              <td align="center"></td>
            </tr>
          </table>
          <input name="bt_usuEditSalvar[]" type="submit" value="Salvar">
          </fieldset>
        </form>