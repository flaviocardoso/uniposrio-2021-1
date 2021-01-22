@extends('layout.layout')

@section('content')
<script type="text/javascript" language="javascript">
function opcoesDeGraficos(valor){
//	alert(valor);
	if(valor==1 || valor ==2){
		document.getElementById('GSimples').style.display='inline';
		document.getElementById('GMultiplos').style.display='none';
	}else{
		document.getElementById('GSimples').style.display='none';
		document.getElementById('GMultiplos').style.display='inline';
	}
}
</script>
<span class="formElement" aria-label="Exame">
	<select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_instDeConclusao.php', 'instDeConclusao'); document.getElementById('idExame').value=this.value;" required>
         $valor){ ?>
        <option value="" ></option>
        
    </select>
    <input type="hidden" id="idExame">
</span><br>
<br>
<!--
<span class="formElement" aria-label="Instituição de Conclusão">
    <select name="relatorio[instDeConclusao]" id="instDeConclusao" style="width:450px;">
        
    </select>
</span>-->
<span class="formElement" aria-label="Programa">
	
    <select name="relatorio[programa]">
        <optgroup label="Programa">
            <option value="0" >Todas</option>
            <option value="D" >Doutorado</option>
            <option value="M" >Mestrado</option>
            <!-- <option value="P" >Mestrado Profissional</option> -->
        </optgroup>
    </select>
</span>
<br/><br/>
<span class="formElement" aria-label="Tipo de Gráfico">
	
    <select name="sl_chartType">
<!--        <optgroup label="Gráfico Simples" id="GSimples">
            <option value="column2d" >Column 2D</option>
            <option value="column3d" >Column 3D</option>
            <option value="line" >Line 2D</option>
            <option value="area2d" >Area 2D</option>
            <option value="bar2d" >Bar 2D</option>
            <option value="bar3d" >Bar 3D</option>
            <option value="pie2d" >Pie 2D</option>
            <option value="pie3d" >Pie 3D</option>
            <option value="doughnut2d" >Doughnut 2D</option>
            <option value="doughnut3d" >Doughnut 3D</option>
            <option value="pareto2d" >Pareto 2D</option>
            <option value="pareto3d" >Pareto 3D</option>
        </optgroup> -->
       <optgroup label="Multiplos Itens" id="GMultiplos">
            <option value="stackedcolumn2d" >Stacked Column 2D</option>
            <option value="stackedcolumn3d" >Stacked Column 3D</option>
            <option value="stackedbar2d" >Stacked Bar 2D</option>
            <option value="stackedbar3d" >Stacked Bar 3D</option>
            <option value="stackedarea2d" >Stacked Area 2D</option>
        </optgroup>
    </select>
</span><br>
<br>
<span class="formElement" aria-label="Largura">
	<?php
		$widthChart = isset($_REQUEST['widthChart'])?$_REQUEST['widthChart']:800;
		$heightChart = isset($_REQUEST['heightChart'])?$_REQUEST['heightChart']:500;
	?>
	<input type="number" min="400" max="1600" value="<?=$widthChart?>" step="50" name="widthChart" size="10"/>
</span>
<span class="formElement" aria-label="Altura">
	<input type="number" min="200" max="1200" value="<?=$heightChart?>" step="50" name="heightChart" size="10"/>
</span>
<input type="hidden" name="mod" value="bt_modD" />
<input type="submit" name="bt_relatorio_D" value="Gerar Gráfico">
@endsection