@extends('layout')

@section('content')
<b>Carta de Recomentação</b><br><br>
<form action='' method='post'  enctype='multipart/form-data' name='formCartaRecomendacao'>
          <input name='euf' type='text' size='40' value='$euf' placeholder='Digite aqui seu número EUF' />"

          <!--<form action="" method="post" enctype="multipart/form-data">-->
            <input name="alunoEuf" type="text" size="60" value="" placeholder="Clique no botão ao lado para exibir o nome do aluno!"/>
            <input name="bt_alunosEuf" type="submit" value="Exibir aluno">
          <!--</form> -->  <br>
          <input name="formulario[id_dados]" type="hidden" value="">
          <input name="formulario[nome_prof]" type="text" placeholder="Nome do Professor/Name of the Referee" size="60" autocomplete="off"><br>
          <input name="formulario[email]" type="email" placeholder="E-mail de professor/Email of the Referee" autocomplete="off" size="40"><br>
          <input name="formulario[fone]" type="tel" placeholder="DDD+telefone/Telephone" autocomplete="off" size="40"><br>
          <input name="formulario[cargo]" type="text" placeholder="Cargo do professor/Academic Position of the Referee" autocomplete="off" size="40"><br>
          <select name="formulario[id_inst]">
            <option selected value="0">Selecione a instituição do professor/Select the Institution of the Referee</option>
            
          </select>
          <br>
        <fieldset><legend>Caso não tenha encontrado a instituição no campo anterior preencha o campo Sigla e Nome da Instituição<br/><em>In case that you could not find your institution in the field above, please fill in the “Acronym of the Institution” and “Name of the Institution” fields below</em></legend>
            <input name="sigla" type="text" placeholder="Sigla/Acronym of the Institution" autocomplete="off" size="20">
            <input name="nomeSigla" type="text" placeholder="Nome da Instituição/Name of the Institution" autocomplete="off" size="100"><br>
        </fieldset>
        <fieldset><legend>Prezado Professor, favor preencher os dados da tabela abaixo, segundo a avaliação que faz do candidato<br/><em>Dear Referee, please fill in the fields in the table below, according to your assessment of the candidate</em></legend>
            <table border="0" cellpadding="6" cellspacing="0" class="tabelaCoresVerticais">
              <tr>
                <th>&nbsp;</th>
                <th align="center"><p>5% superior (Muito bom)</p>
                <p> <em>Top 5% (Very good)</em></p></th>
                <th align="center"><p>Entre 20-5% (Bom)</p>
                <p> <em>Top 5-20% (Good)</em></p></th>
                <th align="center"><p>Entre 50-20% (Regular)</p>
                <p><em>Top 20-50% (Fair)</em></p></th>
                <th align="center"><p>50% inferior (Fraco)</p>
                <p><em>Bottom 50% (Weak)</em></p></th>
                <th align="center"><p>Não conheço</p>
                <p><em>I do not know</em></p></th>
              </tr>
              <tr>
                <td>Domínio da área de atuação<br>
                <em>Skills in the domain of interest</em></td>
                <td align="center"><input type="radio" name="formulario[dominio]" id="radio1" value="1"></td>
                <td align="center"><input type="radio" name="formulario[dominio]" id="radio2" value="2"></td>
                <td align="center"><input type="radio" name="formulario[dominio]" id="radio3" value="3"></td>
                <td align="center"><input type="radio" name="formulario[dominio]" id="radio4" value="4"></td>
                <td align="center"><input type="radio" name="formulario[dominio]" id="radio5" value="0"></td>
              </tr>
              <tr>
                <td>Capacidade intelectual<br>
                <em>Intellectual capacity</em></td>
                <td align="center"><input type="radio" name="formulario[intelectual]" id="radio6" value="1"></td>
                <td align="center"><input type="radio" name="formulario[intelectual]" id="radio7" value="2"></td>
                <td align="center"><input type="radio" name="formulario[intelectual]" id="radio8" value="3"></td>
                <td align="center"><input type="radio" name="formulario[intelectual]" id="radio9" value="4"></td>
                <td align="center"><input type="radio" name="formulario[intelectual]" id="radio10" value="0"></td>
              </tr>
              <tr>
                <td>Iniciativa<br>
                <em>Initiative</em></td>
                <td align="center"><input type="radio" name="formulario[iniciativa]" id="radio11" value="1"></td>
                <td align="center"><input type="radio" name="formulario[iniciativa]" id="radio12" value="2"></td>
                <td align="center"><input type="radio" name="formulario[iniciativa]" id="radio13" value="3"></td>
                <td align="center"><input type="radio" name="formulario[iniciativa]" id="radio14" value="4"></td>
                <td align="center"><input type="radio" name="formulario[iniciativa]" id="radio15" value="0"></td>
              </tr>
              <tr>
                <td>Capacidade de comunicação oral<br>
                <em>Oral communication skills</em></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_oral]" id="radio16" value="1"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_oral]" id="radio17" value="2"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_oral]" id="radio18" value="3"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_oral]" id="radio19" value="4"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_oral]" id="radio20" value="0"></td>
              </tr>
              <tr>
                <td>Capacidade de comunicação escrita<br>
                <em>Written communication skills</em></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_escrita]" id="radio21" value="1"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_escrita]" id="radio22" value="2"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_escrita]" id="radio23" value="3"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_escrita]" id="radio24" value="4"></td>
                <td align="center"><input type="radio" name="formulario[comunicacao_escrita]" id="radio25" value="0"></td>
              </tr>
              <tr>
                <td>Relaciomento com o grupo de trabalho<br>
                <em>Interpersonal skills with other members of the  work group</em></td>
                <td align="center"><input type="radio" name="formulario[relacionamento]" id="radio26" value="1"></td>
                <td align="center"><input type="radio" name="formulario[relacionamento]" id="radio27" value="2"></td>
                <td align="center"><input type="radio" name="formulario[relacionamento]" id="radio28" value="3"></td>
                <td align="center"><input type="radio" name="formulario[relacionamento]" id="radio29" value="4"></td>
                <td align="center"><input type="radio" name="formulario[relacionamento]" id="radio30" value="0"></td>
              </tr>
            </table>
        </fieldset><br>
        <fieldset>
            <legend>Outras informações que julgue conveniente fornecer a respeito do candidato<br>
            <em>Further information about the candidate which  you may deem appropriate to include</em></legend>
            <textarea name="formulario[observacao]" cols="100" rows="10" onKeyUp="MaxLenght(this, 4500, 'saidaTextAreaLimite');" ></textarea><br>
            <label id="saidaTextAreaLimite"> </label>
        </fieldset>
        <input name="formulario[dt_cadastro]" type="hidden" value="<?php echo date("Y-m-d H:i:s"); ?>">
        <input name="bt_salvarCarta" type="submit" value="Salvar">
      <em>Save</em>
    </form>
</div>

@endsection