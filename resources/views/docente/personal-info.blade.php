@extends('layout.layout')

@section('content')

<p>Alterar Dados Pessoais / <em>Fill in Personal Data</em></p>
<form action="" method="post" enctype="multipart/form-data">
<p>
	<span class="formElement" aria-label="Login">
  <input name="docente[login_usuario]" class="formElement" type="text" id="docente[login_usuario]" value="" readonly>
  </span>
  <span class="formElement" aria-label="Nome Completo">
  <input name="docente[nome_usuario]" class="formElement" type="text" id="docente[nome_usuario]" value="" size="50" readonly>
  </span>
  <span class="formElement" aria-label="E-mail">
  <input name="docente[email_usuario]" class="formElement" type="text" id="docente[email_usuario]" value="" size="20" readonly>
  </span>
</p>
<hr>

<p>
    <input type="radio" name="docente[nacionalidade_usuario]" id="docente[nacionalidade_usuario]" value="Brasileiro">
    <label>Brasileiro/Brazilian</label>
    <input type="radio" name="docente[nacionalidade_usuario]" id="docente[nacionalidade_usuario]" value="">
    <label>Estrangeiro/Foreign</label>
    <input name="docente[cpf_usuario]" type="text" id="docente[cpf_usuario]" placeholder="CPF" size="20" value="" title="CPF">
    <input name="docente[passaporte_usuario]" type="text" id="docente[passaporte_usuario]" placeholder="Passaporte/Passport" size="20" value="" title="Passaporte">
</p>
<p>
  
<span class="formElement" aria-label="Instituição">
	<select name="docente[inst_usuario]" class="formElement" onChange="addNewField(this.value, 'instSigla','instNome');"><!-- onChange="alert(this.value);" -->
    	<option></option>
		
        <option value="0">Outro, Preencha os campos 'Sigla' e 'Nome Instituição' abaixo / Other, Fill in the fields 'Acronym' and 'Name Institution' below</option>
    </select>
    <p>
		<input type="text" name="inst[sigla]" id="instSigla" value="" placeholder="SIGLA/Acronym" size="10"/>
		<input type="text" name="inst[nome]" id="instNome" value="" placeholder="Nome Instituição/Name Institution" size="80" />
    </p>
</span><br/>
</p>
<p>
<span class="formElement" aria-label="Departamento">
  <input name="docente[departamento_usuario]" class="formElement" type="text" id="docente[departamento_usuario]" placeholder="Departamento" size="30" value="">
  </span>
</p>
<p>
<span class="formElement" aria-label="Vínculo">
  <input name="docente[vinculo_usuario]" class="formElement" type="text" id="docente[vinculo_usuario]" placeholder="Vinculo" size="30" value="">
  </span>
</p>
<p>
<span class="formElement" aria-label="Telefone Celular">
  <input name="docente[fone_inst_usuario]" class="formElement" type="text" id="docente[fone_inst_usuario]" placeholder="Telefone Celular" size="30" value="">
  </span>
</p>

<p>
	<input type="submit" name="button" id="button" value="Salvar">
</p>
</form>

@endsection