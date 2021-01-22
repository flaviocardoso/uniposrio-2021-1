@extends('layout.layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Informações Completas</legend>
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
              <td width="83"><label>Nome</label></td>
              <td width="480"><input name="textfield2" type="text" id="textfield2" value="" size="45" readonly>
              <label>Login</label><input name="textfield2" type="text" id="textfield2" value="" size="15" readonly></td>
        </tr>
            <tr>
              <td><label>E-mail</label></td>
              <td><input name="textfield3" type="text" id="textfield3" value="" size="30" readonly></td>
            </tr>
            <tr>
              <td><label>Sexo</label></td>
              <td><input name="textfield4" type="text" id="textfield4" value="" size="15" readonly>
              <label>Nacionalidade</label><input name="textfield4" type="text" id="textfield4" value="" size="15" readonly></td>
            </tr>
            <tr>
              <td><label>CPF</label></td>
              <td><input name="textfield5" type="text" id="textfield5" value="" size="15" readonly>
              <label>Passaporte</label><input name="textfield5" type="text" id="textfield5" value="" size="15" readonly></td>
            </tr>
            <tr>
              <td><label>Endereço</label></td>
              <td><input name="textfield6" type="text" id="textfield6" value="" size="35" readonly>
              <label>Número</label><input name="textfield6" type="text" id="textfield6" value="" size="10" readonly>
              <label>Complemento</label><input name="textfield6" type="text" id="textfield6" value="" size="30" readonly></td>
            </tr>
            <tr>
              <td><label>CEP</label></td>
              <td><input name="textfield7" type="text" id="textfield7" value="" size="10" readonly>
              <label>Caixa Postal</label><input name="textfield7" type="text" id="textfield7" value="" size="10" readonly></td>
            </tr>
            <tr>
              <td><label>Bairro</label></td>
              <td><input name="textfield8" type="text" id="textfield8" value="" size="30" readonly></td>
            </tr>
            <tr>
              <td><label>Cidade</label></td>
              <td><input name="textfield9" type="text" id="textfield9" value="" size="25" readonly></td>
            </tr>
            <tr>
              <td><label>Estado</label></td>
              <td><input name="textfield10" type="text" id="textfield10" value="" size="25" readonly>
              <label>Pais</label><input name="textfield10" type="text" id="textfield10" value="" size="10" readonly></td>
            </tr>
            <tr>
              <td><label>Telefone Fixo</label></td>
              <td><input name="textfield11" type="text" id="textfield11" value="" size="15" readonly>
              <label>Telefone Celular</label><input name="textfield11" type="text" id="textfield11" value="" size="15" readonly></td>
            </tr>
            <tr>
              <td><label>Área de Atuação</label></td>
              <td><input name="textfield12" type="text" id="textfield12" value="" size="30" readonly></td>
            </tr>
            <tr>
              <td><label>Instituição de Ensino</label></td>
              <td><input name="textfield13" type="text" id="textfield13" value="" size="40" readonly></td>
            </tr>
            <tr>
              <td><label>Ano de Conclusão</label></td>
              <td><input name="textfield14" type="text" id="textfield14" value="" size="5" readonly></td>
            </tr>
            <tr>
              <td><label>Histórico Graduação</label></td>
              <td>
              
              <a href="" target="_blank"><input type="text" style="color:rgb(0,153,255); cursor:pointer; text-align:center;" value="Visualizar" size="10" readonly></a>
              
              </td>
            </tr>
            <tr>
              <td><label>Histórico Mestrado</label></td>
              <td>
              
              <a href="" target="_blank"><input type="text" style="color:rgb(0,153,255); cursor:pointer; text-align:center;" value="Visualizar" size="10" readonly></a>
              
              </td>
            </tr>
            <tr>
              <td><label>Doc. de Identificacação</label></td>
              <td>
              
              <a href="" target="_blank"><input type="text" style="color:rgb(0,153,255); cursor:pointer; text-align:center;" value="Visualizar" size="10" readonly></a>
              
              </td>
            </tr>
              <tr>
              <td><label>EUF - Comprovante</label></td>
              <td>
              
              <a href="" target="_blank"><input type="text" style="color:rgb(0,153,255); cursor:pointer; text-align:center;" value="Visualizar" size="10" readonly></a>
              
              </td>
            </tr>
            <tr>
              <td><label>Data de Cadastro</label></td>
              <td><input name="textfield18" type="text" id="textfield18" value="" size="20" readonly></td>
            </tr>
            <tr>
              <td><label>Data de Atualização</label></td>
              <td><input name="textfield" type="text" id="textfield" value="" size="20" readonly></td>
            </tr>
          </table>
	</fieldset>
</form>
@endsection