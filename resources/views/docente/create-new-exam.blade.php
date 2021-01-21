@extends('layout.layout')

@section('content')
<table>
<tr>
  <td colspan="2" class="separadorVertical">Definições da Prova</td>
</tr>
<tr>
  <td colspan="2">
  <label>Ano</label> <input type="number" name="formDadosDoExame[ano_insc]" min="2010" max="2100" size="2" required list="listaDeAnos">
  <label>Semestre</label> <input type="number" name="formDadosDoExame[semestre_insc]" min="1" max="2" step="1" size="1" required list="listaDeSemestres">
  <datalist id="listaDeAnos">
  	<option value="2010">
    <option value="2011">
    <option value="2012">
    <option value="2013">
    <option value="2014">
    <option value="2015">
    <option value="2016">
    <option value="2017">
    <option value="2018">
    <option value="2019">
    <option value="2020">
    <option value="2021">
    <option value="2022">
    <option value="2023">
    <option value="2024">
    <option value="2025">
  </datalist>
  <datalist id="listaDeSemestres">
  	<option value="1">
    <option value="2">
  </datalist>
	<hr></td>
  </tr>
<tr>
  <td><label>Situação</label></td>
  <td><input type="radio" name="formDadosDoExame[status]" value="A" checked>
    <label>Ativo</label>
      <input type="radio" name="formDadosDoExame[status]" value="I">
<label>Inativo (é preciso SALVAR para tornar ativo)</label></td>
</tr>
<tr>
  <td><label>Data das Inscrições</label></td>
  <td>
  <input name="formDadosDoExame[dt_ini_insc]" type="date" required class="inicio">
    <label>à</label>
  <input name="formDadosDoExame[dt_fim_insc]" type="date" required class="fim"></td>
</tr>
<tr>
  <td><label>Data da Prova</label></td>
  <td><input name="formDadosDoExame[dt_prova]" type="date" required>
    <label>Hora Início</label>
    <input name="formDadosDoExame[hr_ini_prova]" type="time" required>
    <label>Duração</label>
  <input name="formDadosDoExame[duracao_prova]" type="time" required><label>Quantidade de Questões</label>
    <input name="formDadosDoExame[qtd_questoes]" type="number" min="1" max="8" step="1" placeholder="-" required size="2">
  </td>
</tr>
<tr>
  <td><label>Data de Solicitação</label></td>
  <td><input name="formDadosDoExame[dt_solicitacao]" type="date" required></td>
</tr>
<tr>
  <td><label>Data Resultado</label></td>
  <td><input name="formDadosDoExame[dt_resultado]" type="date" required></td>
</tr>
<tr>
  <td><label>Data Revisão</label></td>
  <td><input name="formDadosDoExame[dt_revisao]" type="date" required>
    <label>Hora Revisão</label>
  <input name="formDadosDoExame[hr_revisao]" type="time" required></td>
</tr>
<tr>
  <td><label>Data da Entrevista</label></td>
  <td>
    <input type="date" name="formDadosDoExame[dt_ini_entr]" required class="inicio"><label>à</label><input type="date" name="formDadosDoExame[dt_fim_entr]" required class="fim">
    <input type="hidden" name="formDadosDoExame[dt_cadastro]" value="">
    <input type="hidden" name="formDadosDoExame[id_usu_cadastro]" value="">
</td>
</tr>
<tr>
  <td colspan="2" class="separadorVertical">Ponto de Corte | Mestrado</td>
</tr>
	<tr>
	  <td>
        <input type="hidden" name="" value="">
        <input type="number" name="" min="0.00" max="10.00" step="0.05" value="10.00" required size="4">
      </td>
	  <td><strong></strong> - </td>
	</tr>
    
    <tr>
  <td colspan="2" class="separadorVertical">Ponto de Corte | Doutorado</td>
</tr>

	<tr>
	  <td>
        <input type="hidden" name="" value="">
        <input type="number" name="" min="0.00" max="10.00" step="0.05" value="10.00" required size="4">
      </td>
	  <td><strong>Sigla</strong> - Instituições</td>
	</tr>
</table>
</fieldset>
<input name="bt_salvarNovoDadosDoExame" type="submit" value="Salvar">
</td>
</tr>
@endsection