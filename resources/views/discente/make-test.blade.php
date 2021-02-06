@extends('layout.layout')

@section('content')
<!-- Inscrição para o exame -->
            <fieldset style="background:rgba(255,255,255,0.3);"><h1 align="center"><?php echo $resultadoExame['ano_insc']; ?>/<?php echo $resultadoExame['semestre_insc']; ?></h1></fieldset>
            <form action="" method="post" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="10" cellspacing="5">
              <tr>
                <td style="border-right:rgba(153,153,153,1) 1px solid;">As inscrições começam em <strong><?php echo date("d/m/Y",strtotime($resultadoExame['dt_ini_insc'])); ?></strong> e se encerram em <strong><?php echo date("d/m/Y",strtotime($resultadoExame['dt_fim_insc'])); ?></strong>. Confira as informações baixo descritas e, caso estaja de acordo, clique no botão 'Salvar' para confirmar sua participação no Exame Unificado das Pós-Graduações de Física do Rio de Janeiro - UNIPOSRIO-Física.</td>
                <td>Registrations open on&nbsp;<strong><?php echo date("Y-m-d",strtotime($resultadoExame['dt_ini_insc'])); ?></strong>&nbsp;and  close on&nbsp;<strong><?php echo date("Y-m-d",strtotime($resultadoExame['dt_fim_insc'])); ?></strong>. Please check the information below  and, if you agree with it, click on the button &lsquo;Salvar/Save&rsquo; to confirm that  you will be taking part in the Exame Unificado das Pós-Graduações de Física do  Rio de Janeiro - UNIPOSRIO-Física.</td>
              </tr>
              <tr>
                <td style="border-right:rgba(153,153,153,1) 1px solid;"><p>A prova será realizada em <strong><?php echo $resultadoExame['hr_ini_prova']; ?></strong> e terá duração de <strong><?php echo $resultadoExame['duracao_prova']; ?></strong> horas.</p>
                <p>A prova será elaborada com <strong><?php echo $resultadoExame['qtd_questoes']; ?></strong> questões.</p></td>
                <td><p><em>The exam will take place at<strong> <?php echo $resultadoExame['hr_ini_prova']; ?></strong> (Brasilia  time)<strong>&nbsp;</strong>and will last for up to <strong><?php echo $resultadoExame['duracao_prova']; ?></strong>&nbsp;hours.</em></p>
                <p>The exam will consist of <strong><?php echo $resultadoExame['qtd_questoes']; ?></strong> questions.</p></td>
              </tr>
              <tr>
                <td colspan="2"><p>
                  <label>Aluno/<em>Student</em>:</label>
                  <strong><?php echo $resultadoAluno['nome_aluno']; ?></strong></p>
                  <p>
                    <label>E-mail:</label>
                    <strong><?php echo $resultadoAluno['email_aluno']; ?></strong></p>
                  <p>
                  </p>
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>Programa de</td>
                      <td rowspan="2"><select name="formulario[programa]" id="formulario[programa]">
                        <option value="M">Mestrado/Master</option>
                        <option value="D">Doutorado/Doctorate degree</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td><em>Program</em></td>
                    </tr>
                    </table>
                    <table>
                    <tr>
                      <td>Sua prova será realizada no estado do Rio de Janeiro?</td>
                      <td rowspan="2"><select name="formulario[prova_rio]" id="select">
                        <option value="S">Sim/Yes</option>
                        <option value="N">Não/No</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td><em>Your exam will take place in the state of Rio de  Janeiro?</em></td>
                    </tr>
                </table></td>
              </tr>
            </table>
                <p>
                    <input name="formulario[id_aluno]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[id_dados]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[chave_insc]" type="hidden" id="textfield" value="" size="22">
                    <input name="formulario[nota_q1]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q2]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q3]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q4]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q5]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q6]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q7]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_q8]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[nota_geral]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[classificacao]" type="hidden" id="textfield" value="" size="3">
                    <input name="formulario[dt_inscricao]" type="hidden" id="textfield" value="" size="20">
              </p>
                <p>
                    Save
                    <input type="submit" name="bt_inscricaoExame" id="bt_inscricaoExame" value="Salvar"><label><?php echo isset($obs)?$obs:NULL; ?></label>
                </p>
</form>

@endsection