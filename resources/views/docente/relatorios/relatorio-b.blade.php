@extends('layout.layout')

@section('content')
<span class="formElement" aria-label="Exame">
<select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_paises.php', 'examePaises'); document.getElementById('idExame').value=this.value;" required>
    
    </select><input type="hidden" id="idExame">
</span>
<span class="formElement" aria-label="Gerar Gráfico por">

<select name="seletor">
	<option value="1" >País</option>
    <option value="2">Estado</option>
    <option value="4" >Nacionalidade</option>
    <option value="5" >Área de atuação</option>
    <option value="6" >Ano de Conclusão</option>
    <option value="7" >Instituição de Conclusão</option>
    <option value="8" >Instituições selecionadas</option>
</select>
</span>
<br/><br/>
<input type="hidden" name="mod" value="bt_modB" />
<span class="formElement" aria-label="Tipo de Gráfico">

<select name="sl_chartType">
	<optgroup label="Tipo de Gráfico">
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
    </optgroup>
</select>
</span>
<span class="formElement" aria-label="Largura">
	<?php
		$widthChart = isset($_REQUEST['widthChart'])?$_REQUEST['widthChart']:800;
		$heightChart = isset($_REQUEST['heightChart'])?$_REQUEST['heightChart']:600;
	?>
	<input type="number" min="400" max="1600" value="<?=$widthChart?>" step="50" name="widthChart" size="10"/>
</span>
<span class="formElement" aria-label="Altura">
	<input type="number" min="200" max="1200" value="<?=$heightChart?>" step="50" name="heightChart" size="10"/>
</span><br>
<input type="submit" name="bt_relatorio_B" value="Gerar Gráfico">
@endsection