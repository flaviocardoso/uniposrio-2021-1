@extends('layout.layout')

@section('content')
<form action="" method="post" enctype="multipart/form-data" name="formCartaRecomendacao">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Carta de Recomendação</legend>
				<fieldset class="destacarCarta"><legend>Exame - <?php echo $resultado['ano_insc'].'/'.$resultado['semestre_insc']; ?></legend>
				<table border="0" cellpadding="0" cellspacing="5">
				  <tr>
					<td><label>Professor</label></td>
					<td><input type="text" value="" size="89" readonly></td>
					</tr>
				  <tr>
					<td><label>Cargo</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>E-mail</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Carta</label></td>
					<td><textarea name="textarea" cols="73" rows="20" readonly></textarea></td>
					</tr>
				  <tr>
					<td><label>Domínio</label></td>
					<td>
					<input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Intelectual</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Iniciativa</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Comunicação Oral</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Comunicação Escrita</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>
				  <tr>
					<td><label>Relacionamento</label></td>
					<td><input type="text" value="" size="89" readonly></td>
				  </tr>

				  <tr>
					<td><label>Cadastrado em</label></td>
					<td><input type="text" value="" size="20" readonly></td>
					</tr>
				</table>
				</fieldset>
				<p> 
				  
	  </p>
				
    </fieldset>
</form>
@endsection