@extends('layout.layout')

@section('content')

<form action="" method="post" enctype="multipart/form-data" name="formGerenciaAlunos">
        <input name="tf_palavraChave" type="text" id="tf_palavraChave" size="40" value="">
        <input type="submit" name="bt_filtro" id="bt_filtro" value="Filtrar">
    
            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tabelaCoresVerticais">
              <tr align="center">
                        <th></th>
                		<th></th>
                		<th></th>
                		<th><input name="sendAll[all]" type="submit" value="o" class="icones" title="Enviar Mensagem para todos os candidatos"></th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Classificação</th>
                        <!--<th>Data de Criação</th>-->
                        <th>Dados Completados em</th>
              </tr>
                    
                        <tr align="center">
                            <td><input name="notas[]" type="submit" value="4" class="icones" title="Notas de Prova"></td>
                            <td><input name="infos[]" type="submit" value="=" class="icones" title="Informações Completas"></td>
                            <td><input name="carta[]" type="submit" value="b" class="icones" title="Carta de Recomendação"></td>
                            <td><input name="email[]" type="submit" value="o" class="icones" title="Enviar Mensagem individual"></td>
                            <td align="left"><strong></strong></td>
                            <td align="left"></td>
                            <td align="left"></td>
                            <td align="center"></td>
                            <!--<td style="color:rgba(51,102,153,0.5); padding:0 15px;"></td>-->
                            <td style="color:rgba(51,102,153,0.5); padding:0 15px;"></td>
                        </tr>
            
              <tr align="center">
                        <td colspan="9"></td>
              </tr>
            </table>
    
</form>
@endsection