@extends('layout.layout')

@section('content')
<span class="formElement" aria-label="Exame">
<select name="relatorio[exame]" class="formElement" onChange="autoCompletar(this.value, 'pages/docente/', '_relatorios_exame_paises.php', 'examePaises'); document.getElementById('idExame').value=this.value;" required>
       
        <option value="" ></option>
        
    </select><input type="hidden" id="idExame">
</span>
<span class="formElement" aria-label="Gerar Gráfico por">
<?php
$opcoesDeGraficos = isset($_REQUEST['seleA'])?$_REQUEST['seleA']:false;
$opcoesDePrograma = isset($_REQUEST['programa'])?$_REQUEST['programa']:false;
?>
<select name="seleA">
	<optgroup label="Média das notas por">
        <option value="1" >Questão</option>
        <option value="2" >Instituição</option>
        <option value="3" >Instituição & Questão</option>
    </optgroup>
</select>
</span><br>
<br>
<span class="formElement" aria-label="Programa">
<select name="programa">
    <optgroup label="Programa">
        <option value="0" >Todas</option>
        <option value="D" >Doutorado Academico</option>
        <option value="M" >Mestrado Academico</option>
        <option value="P" >Mestrado Profissional</option>
    </optgroup>
</select>
</span>
<br/><br/>
<span class="formElement" aria-label="Tipo de Gráfico">

<select name="seleB">
	<optgroup label="Gráfico Simples" data-seletor='1'>
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
	<optgroup label="Gráfico Simples" data-seletor='2'>
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
	<optgroup label="Multiplos Itens" data-seletor='3'>
        <option value="stackedcolumn2d" >Stacked Column 2D</option>
        <option value="stackedcolumn3d" >Stacked Column 3D</option>
        <option value="stackedbar2d" >Stacked Bar 2D</option>
        <option value="stackedbar3d" >Stacked Bar 3D</option>
        <option value="stackedarea2d" >Stacked Area 2D</option>
 <!--       <option value="msstackedcolumn2d" >Multi-series Stacked Column 2D</option> -->
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
<input type="hidden" name="mod" value="bt_modC" />
<input type="submit" name="bt_relatorio_C" value="Gerar Gráfico">
<script type="text/javascript" src="functions/jquery-3.1.1.min.js"></script>
<script type="text/javascript" language="javascript">
//	http://jsfiddle.net/XH42p/
var seletorA = $('select[name="seleB"] optgroup');
$('select[name="seleA"]').on('change', function () {
    var Seletor = this.value;
    var novoSelect = seletorA.filter(function () {
        return $(this).data('seletor') == Seletor;
    });
    $('select[name="seleB"]').html(novoSelect);
});
</script>
@endsection