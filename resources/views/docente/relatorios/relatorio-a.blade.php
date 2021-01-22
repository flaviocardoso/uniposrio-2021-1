@extends('layout.layout')

@section('content')
<span class="formElement" aria-label="Exame">
    <select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_paises.php', 'examePaises'); document.getElementById('idExame').value=this.value;" required>
        <option value="0" selected>---</option>
    </select>
    <input type="hidden" id="idExame">
</span>
<br>
<span class="formElement" aria-label="Programa">
    <select name="relatorio[programa]" class="formElement">
      <option value="T" >Todos</option>
      <option value="D">Doutorado</option>
      <option value="M">Mestrado</option>
    </select>
</span>
<br>
<span class="formElement" aria-label="Pais">
    <select name="relatorio[paises]" class="formElement" id="examePaises" onChange="onChangePais(this.value);">
      <option value="">---</option>
    </select>
    <input type="hidden" id="idPais">
</span><br>
<br>

<span class="formElement" aria-label="Estado">
    <select name="relatorio[estados]" class="formElement" id="examePaisesEstados" onChange="autoCompletar(document.getElementById('idExame').value+'&pais='+document.getElementById('idPais').value+'&estado='+this.value, 'pages/docente/', '_relatorios_exame_paises_estados_cidades.php', 'examePaisesEstadosCidades');">
        <option value="">---</option>
    </select>
</span>
<span class="formElement" aria-label="Cidade">
    <select name="relatorio[cidades]" class="formElement" id="examePaisesEstadosCidades">
        <option value="">---</option>
    </select>
</span>
<br>
<input type="hidden" name="mod" value="bt_modA" />
<input type="submit" name="bt_relatorio_A" value="Gerar Relatório">
<input type="submit" name="bt_relatorioPDF_A" value="Gerar PDF">
@endsection