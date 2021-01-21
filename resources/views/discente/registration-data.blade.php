@extends('layout.layout')

@section('content')
<p><h2>Completar Dados Pessoais / <em>Fill in Personal Data</em></h2></p> <br/>
<p>Dúvidas com a sua inscrição? Envie um e-mail para <a href="mailto:posgrad@cbpf.br">posgrad@cbpf.br</a>. </p> 
<p>Problemas técnicos com a sua inscrição? Envie um e-mail para <a href="mailto:web@cbpf.br">web@cbpf.br</a>. </p>
<br/> 

<form action="" method="post" enctype="multipart/form-data">
<p>
  <span class="formElement" aria-label="Login"><input name="discente[login]" type="text" id="discente[login]" value="" readonly></span>
  <span class="formElement" aria-label="Nome completo / Full name"><input name="discente[nome_aluno]" type="text" id="discente[nome_aluno]" value="" size="50" readonly></span>
  <span class="formElement" aria-label="E-mail"><input name="discente[email_aluno]" type="text" id="discente[email_aluno]" size="20" readonly></span>
</p>
<hr>

<p>
      <span class="formElement" aria-label="EUF/Nota">
        <input name="discente[euf]" type="text" id="discente[euf]" placeholder="Digite aqui seu número EUF" size="40" value=""  required>
        <input name="discente[nota]" type="number" placeholder="Digite aqui sua nota" size="13" value=""  min="0.00" max="10.00" step="0.01" required>
      </span>
    </p>
    <p>
      <span class="formElement" aria-label="Categoria">
        <select name="discente[categoria]" class="formElement" required>
          <option value="">Selelecione Mestrado/Doutorado</option>
		  
				<option value="M" <?=$selected1?>>Mestrado</option>
				<option value="D" <?=$selected2?>>Doutorado</option>
			
        </select>
      </span>
    </p>


<p>
    <input type="radio" name="discente[nacionalidade_aluno]" id="discente[nacionalidade_aluno]" value="B" required>
    <label>Brasileiro/Brazilian</label>
    <input type="radio" name="discente[nacionalidade_aluno]" id="discente[nacionalidade_aluno]" value="E">
    <label>Estrangeiro/Foreign</label>
    <span class="formElement" aria-label="CPF/Passport">
    <input name="discente[cpf_aluno]" type="text" id="discente[cpf_aluno]" placeholder="CPF" size="20" value="" title="CPF">
    <input name="discente[passaporte_aluno]" type="text" id="discente[passaporte_aluno]" placeholder="Passaporte/Passport" size="20" value="" title="Passaporte"></span>
</p>
<p>
	<span class="formElement" aria-label="Endereço/Address">
  <input name="discente[logradouro_aluno]" type="text" id="discente[logradouro_aluno]" placeholder="Endereço/Address" size="60" value="" required>
  <span class="formElement" aria-label="Número/Street number">
  <input name="discente[numero_log_aluno]" type="text" id="discente[numero_log_aluno]" placeholder="Número/Number" size="15" value="" required></span>
</p>
<p><span class="formElement" aria-label="Complemento/Apartment number">
  <input name="discente[complemento_log_aluno]" type="text" id="discente[complemento_log_aluno]" placeholder="Complemento/Complement" size="55" value="" ></span>
</p>
<p><span class="formElement" aria-label="Bairro/Neighborhood">
  <input name="discente[bairro_log_aluno]" type="text" id="discente[bairro_log_aluno]" placeholder="Bairro/Neighborhood" size="40" value="" required></span>
</p>
<p><span class="formElement" aria-label="Cidade/City">
  <input name="discente[cidade_aluno]" type="text" id="discente[cidade_aluno]" placeholder="Cidade/City" size="40" value="" required></span>
</p>
<p><span class="formElement" aria-label="UF/State">
  <input name="discente[estado_aluno]" type="text" id="discente[estado_aluno]" placeholder="UF/State" size="30" value="" list="list_uf" autocomplete="off" required></span>
  
</p>
<p><span class="formElement" aria-label="Pais/Country">
  <input name="discente[pais_aluno]" type="text" id="discente[pais_aluno]" placeholder="Pais/Country" size="35" value="" list="list_paises" autocomplete="off" required></span>
  <datalist id="list_paises">
  <?php
	foreach($array_paises as $sigla_pais => $nome_pais){
		echo "<option value='$sigla_pais'>$nome_pais</option>";
	}
  ?>
  </datalist>
</p>
<p><span class="formElement" aria-label="C.E.P./Zip code">
  <input name="discente[cep_aluno]" type="text" id="discente[cep_aluno]" placeholder="C.E.P./Zip code" size="20" value="" onKeyUp="return txtBoxFormat(this, '99.999-999', event);" required></span>
  <!--
  <span class="formElement" aria-label="Caixa Postal/P.O. Box">
  <input name="discente[caixa_postal_aluno]" type="text" id="discente[caixa_postal_aluno]" placeholder="Caixa Postal/P.O. Box" size="20" value="<?php //echo formCompletar('caixa_postal_aluno', $formulario, $resultado); ?>"></span>
  <button type="button" onClick="document.getElementById('discente[caixa_postal_aluno]').value='Não se aplica';">Clique aqui</button>
  Caso não possua caixa postal /<em>Click here in case you do not have a</em> P.O. box. </p>
-->
<p><span class="formElement" aria-label="Telefone Celular/Cell Phone">
  <input name="discente[cel_aluno]" type="text" id="discente[cel_aluno]" placeholder="Telefone Celular/Cell Phone" size="20" value="" onKeyUp="return txtBoxFormat(this, '(99)99999-9999', event);" required></span>
</p>
<p><span class="formElement" aria-label="Área de Atuação/Area">
<select name="discente[area_atuacao_aluno]" onChange="insertOther(this.value, 'newAreaAtuacao');">
	<option></option>
	
    <option value="0">Outro/Other</option>
</select></span>
<p>
<input type="text" placeholder="Digite a Area de Atuação/Occupation area" name="newAreaAtuacao" id="newAreaAtuacao" class="ocultar" size="80"/>
</p>
<script type="text/javascript" language="javascript">
function addNewField(value, elementAffectedA, elementAffectedB){
	eleA = document.getElementById(elementAffectedA);
	eleB = document.getElementById(elementAffectedB);
	if(value!=0){
		eleA.readOnly = 'readonly';
		eleA.value = null;
		eleB.readOnly = 'readonly';
		eleB.value = null;

	}else{
		eleA.readOnly = '';
		eleB.readOnly = '';
	}
}
</script>
<p>
<span class="formElement" aria-label="Instituto de Conclusão/Host Institution">
  <select name="discente[inst_conclu_aluno]" class="formElement" onChange="addNewField(this.value, 'instSigla','instNome');">
    <!-- onChange="alert(this.value);" -->
    <option></option>
    
    <option value="0">Outro, Preencha os campos 'Sigla' e 'Nome Instituição' abaixo / Other, Fill in the fields 'Acronym' and 'Name Institution' below</option>
    </select>
</span>
</p><p>
<span class="formElement" aria-label="Instituto de Conclusão/Host Institution">

    	<input type="text" name="inst[sigla]" id="instSigla" placeholder="SIGLA/Acronym" size="10" readonly /><input type="text" name="inst[nome]" id="instNome" placeholder="Nome Instituição/Name Institution" size="80" readonly />
    </span></p>
  <p><span class="formElement" aria-label="Ano de Conclusão/Year of completion">
  <input name="discente[ano_conclusao_aluno]" type="text" id="discente[ano_conclusao_aluno]" placeholder="Ano de Conclusão/Conclusion Year" size="20" value="" required>
  </span>
  <input type="hidden" name="discente[dt_atualizacao_aluno]" id="discente[dt_atualizacao_aluno]" value="<?php echo date('Y-m-d h:i:s'); ?>">
</p>
<p>
  <input type="submit" name="button" id="button" value="Salvar"><em>Save</em>
</p>
</form>

<br/>
<p>Dúvidas com a sua inscrição? Envie um e-mail para <a href="mailto:posgrad@cbpf.br">posgrad@cbpf.br</a>. </p>
<p>Problemas técnicos com a sua inscrição? Envie um e-mail para <a href="mailto:web@cbpf.br">web@cbpf.br</a>. </p>
<br/> 
@endsection