@extends('layout.layout')

@section('content')
<style type="text/css">
#visuDadosAlunos{
	display:block;
	width:600px !important;
	height:300px;
	overflow-y:scroll;
	border:rgba(0,0,0,1) 1px solid;
	border-radius:3px;
}
.vda{
	font-size:9px;
}
.bta{
	padding:5px 10px;
	background:rgba(51,153,255,1);
	color:rgba(255,255,255,1) !important;
	font-size:12px;
	line-height:26px;
}
</style>

<table width="100%" border="0">
  <tr>
    <td valign="top"><span class="formElement" aria-label="Exame">
    <select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_visualizarDadosAlunos.php', 'visuDadosAlunos'); document.getElementById('idExame').value=this.value;" required>
        
    </select>
    </span>
    </td>
    <td valign="top">
        <input type="hidden" id="idExame">
        <span class="formElement" aria-label="Dados dos Alunos">
                <div id="visuDadosAlunos">
                    
                </div>
                </span>
        <input type="hidden" name="mod" value="bt_modE" />
    </td>
  </tr>
</table>
@endsection