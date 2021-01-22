@extends('layout.layout')

@section('content')
<style type="text/css">
		#entrevista tr:nth-child(2n+2){
			background:rgba(218,230,233,1);
		}
		.textoBranco{
			color:rgba(255,255,255,1);
			/*font-variant:small-caps;*/
		}    
   .table-header th {
      padding: 5px 10px;
    }
    .table-header td {
      /* width: 30px; */
      text-align: center;
      /* padding: 10px 5px; */
    }
    .table-header th.rotate {
      height: 200px;
      white-space: nowrap;
    }
    .table-header th.rotate > div {
      -webkit-transform: translate(0px, 50px) rotate(270deg);
              transform: translate(0px, 50px) rotate(270deg);
      width: 30px;
    }
    .table-header th.rotate > div > strong {
      text-align: center;
      /* border-bottom: 1px solid #ccc;
      padding: 5px 10px; */
    }
    .table-header th.row-header {
      padding: 0 10px;
      border-bottom: 1px solid #ccc;
    }
    th.rotate {
      height: 140px;
      white-space: nowrap;
    }
    th.rotated > div {
      transform: translate(0px, 40px) rotate(270deg); /* Equal to rotateZ(45deg) */
      /* background-color: pink; */
      width: 30px;
    }
    th.rotated > div > strong {
      padding: 5px 10px;
    }
		#entrevista{
			font-size:12px;
		}
	table[id='entrevista'] thead{
		background:rgba(74,112,123,1);
		line-height:40px;
	}
	#entrevista tr td:first-child{
		font-variant:small-caps;
		}
    </style>

	<table width="100%" border="0" cellpadding="3" cellspacing="2" class="table-header" id="entrevista">
      <tr bgcolor="#4A707B">
        <th align="center" class="textoBranco rotate"><div><strong>CANDIDATO</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>PROGRAMA</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>NOTA</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>SIGLA</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>EUF</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>HIST. GRADUAÇÃO</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>HIST. MESTRADO</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>DOC. DE <br>IDENTIFICAÇÃO</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>EUF COMPROVANTE</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>CARTAS DE <br>RECOMENDAÇÃO</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>ALTERAR NOTA</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>ENVIAR EMAIL</strong></div></th>
        <th align="center" class="textoBranco rotate"><div><strong>FICHA COMPLETA</strong></div></th>
      </tr>
        <tr>
            <td>Nome</td>
            <td align="center">Mestrado ou Doutorado</td>
            <td align="center">media</td>
            <td align="center">sigla</td>
            <td align="center">euf</td>
            <td align="center">Historico</td>
            <td align="center">Hist. Mestrado</td>
            <td align="center">Documentos</td>
            <td align="center">Comprovate euf</td>
            <td align="center">Carta de Recomentação</td>
            <td align="center">Aterarar nota</td>
            <td align="center">Enviar email</td>
            <td align="center">ficha completa </td>

        </tr>
	</table>
@endsection