@extends('layout.layout')

@section('content')
<script type="text/javascript" language="javascript">
	function saveInstSelect(value, status, out){
		if (window.XMLHttpRequest){// codigo para IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// codigo para IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
			//	document.getElementById(out).innerHTML = xmlhttp.responseText;
			}
		}
		//	alert(value+", "+status+", "+out);
		xmlhttp.open("GET", 'pages/discente/_salvarInstSelecionada.php?valores='+value+'&status='+status, true);
		xmlhttp.send();
	}
	function aviso(){
		document.getElementById('divAlert').innerHTML = 'Sua opção foi salva em nosso sistema!';
		setTimeout(function(){
			document.getElementById('divAlert').firstChild.data = '';
		},7000);
	}
</script>
<div>
  <h2>Caso Aprovado, selecione a ou as instituições disponíveis para realizar entrevista.<br>
	Observando o EXAME para o qual realizou prova.
	<?php 
	   if ($_SESSION['categoria'] == 'M') {
		   echo "Agende para Mestrado.</h2>";
	   }
	   elseif ($_SESSION['categoria'] == 'D') {
			echo "Agende para Doutorado.</h2>";
	   }
	?>
<p>Lembre-se, não é preciso salvar, apenas marque as instituições às quais deseja concorrer</a>. </p>


</div>
<table border="1" cellpadding="5" cellspacing="0" width="100%" bordercolor="#FFFFFF">
  <tr bgcolor="#FFFFFF">
    <td align="center" width="80"><strong>SEMESTRE</strong></td>
    <td align="center" width="40">NOTA<!-- <img src="images/mediaNotas.png" height="14" title="Média das Notas"> --></td>
    <td align="center" width="40">CORTE<!-- <img src="images/pontoDeCorte.png" height="14" title="Nota de Corte"> --></td>
    <td align="center" width="120"><strong>SITUAÇÃO</strong></td>
    <td width="20" align="center">AGENTAMENTO<!-- <img src="images/selecione.png" alt="" height="14" title="Caso Aprovado,&#13; selecione a ou as instituições disponíveis para realizar entrevista."> --></td>
    <td align="center"><strong>INSTITUIÇÃO</strong></td>
  </tr>
      <tr>
        <td align="center" width="80">2021.1</td>
        <td align="center" width="40">10</strong></td>
        <td align="center" width="40">10</strong></td>
        <td align="center" width="120"><strong style="color:blue">Habilitado</strong></td>
        <td width="20" align="center">
        <input type="checkbox" name="checkbox" id="checkbox" value="">
        </td>
        <td align="left">
        </td>
      </tr>

</table>
<br/> 
<p>Problemas para agendar sua entrevista? Envie um e-mail para <a href="mailto:posgrad@cbpf.br">posgrad@cbpf.br</a>. </p>

@endsection