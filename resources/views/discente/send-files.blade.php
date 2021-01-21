@extends('layout.layout')

@section('layout')
<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
	<table border="0" cellpadding="0" cellspacing="5">
	  <tr>
	    <td><label>Histórico Graduação / Undergraduate Degree Grades</label></td>
	    <td>
        <input name="formulario[arq_historico_grad]" type="file" placeholder="Histórico Graduação/Education Associate"></td>
      </tr>
	  <tr>
	    <td><label>Histórico Mestrado / Master’s Degree Grades</label></td>
	    <td><input name="formulario[arq_historico_mest]" type="file" placeholder="Histórico Mestrado/Historical Masters"></td>
      </tr>
	  <tr>
	    <td><label>Docs. de Identificação / Identification Documents</label></td>
	    <td><input name="formulario[arq_documentos]" type="file" placeholder="Arquivo Documentos/Archive Documents"></td>
      </tr>
		<tr>
	    <td><label>Comprovante EUF/ EUF Proof of Application</label></td>
	    <td><input name="formulario[arq_euf]" type="file" placeholder="Comprovante EUF/ EUF Proof of Application"></td>
      </tr>
	  <tr>
	    <td><input name="bt_enviarArquivos" type="submit" value="Enviar Arquivos" id="bt_enviarArquivos"><em>Send Files</em></td>
	    <td>Os arquivos devem ter tamanho inferior a 10 Megabytes e formato PDF<br/><em>The files must be smaller than 10Megabytes and in PDF format</em></td>
      </tr>
  </table>
</form>
<br/>
<p>Dúvidas para enviar seus arquivos? Envie um e-mail para <a href="mailto:posgrad@cbpf.br">posgrad@cbpf.br</a>. </p>
<p>Problemas técnicos para enviar seus arquivos? Envie um e-mail para <a href="mailto:web@cbpf.br">web@cbpf.br</a>. </p>

@endsection