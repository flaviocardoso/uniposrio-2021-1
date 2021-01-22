@extends('layout.layout')

@section('content')
<form method="post" enctype="multipart/form-data">
    <fieldset style='background:rgba(255,255,255,0.6);'><legend>Notas de Prova</legend>
          
  
          <input name="nome_aluno" type="text" id="textfield" value="" size="40" readonly>
          <input name="nota" type="number" id="textfield" value="" size="40"  min="0.00" max="10.00" step="0.01">
          <input type="submit" name="notas[]" value="Confirmar">

         
    </fieldset>
</form>
@endsection
