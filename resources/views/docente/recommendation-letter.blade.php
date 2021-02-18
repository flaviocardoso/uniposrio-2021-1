@extends('layout.layout')

@section('content')

<form action="" method="post" enctype="multipart/form-data" name="formCartaRecomendacao">
    <div class="container my-4">
        <p>Carta de Recomendação</p>
        <!-- selecione o id de aluno -->
        <div class="form-group">
        <label for="">Nome do aluno</label>
        <select name="student_id" class="form-control" title="Nome do aluno">
        <option selected disabled>Nome do aluno/Name of the Student</option>
        </select>
        @error('student_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
        <label for="nomeprof">Nome do Professor</label>
        <input name="professor" type="text" value="{{ old('professor') }}" class="form-control @error('professor') is-invalid @enderror " id="nomeprof" title="Nome do Professor/Name of the Referee" required placeholder="Nome do Professor/Name of the Referee" size="80" autocomplete="off">
        @error('professor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label for="professoremail">Email do Professor</label>
                <input name="professoremail" type="email" value="{{ old('professoremail') }}" class="form-control @error('professoremail') is-invalid @enderror " title="E-mail de professor/Email of the Referee" required placeholder="E-mail de professor/Email of the Referee" autocomplete="off" size="40">
                @error('professoremail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Telefone do Professor</label>
                <input name="professorphone" type="tel" value="{{ old('professorphone') }}" class="form-control @error('professorphone') is-invalid @enderror " title="DDD+telefone/Telephone" required placeholder="DDD+telefone/Telephone" autocomplete="off" size="40">
                @error('professorphone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-4">
                <label for="">Cargo do Professor</label>
                <input name="professorbond" type="text" value="{{ old('professorbond') }}" class="form-control @error('professorbond') is-invalid @enderror " title="Cargo do professor/Academic Position of the Referee" required placeholder="Cargo do professor/Academic Position of the Referee" autocomplete="off" size="40">
                @error('professorbond')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        </div>
        <div class="form-group">
        <label for="">Instituição do Professor</label>
        <select name="professorintituion"  onchange="instituionSelect()" id="valueInstituion" title="Selecione a instituição do professor/Select the Institution of the Referee" class="form-control">
        <option>Selecione a instituição do professor/Select the Institution of the Referee</option>
        <option value="0">Outro, Preencha os campos 'Sigla' e 'Nome Instituição' abaixo / Other, Fill in the fields 'Acronym' and 'Name Institution' below</option>
        </select>
        @error('professorintituion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="">
        <b>
            Caso não tenha encontrado a instituição no campo anterior preencha o campo Sigla e Nome da Instituição<br/><em>In case that you could not find your institution in the field above, please fill in the “Acronym of the Institution” and “Name of the Institution” fields below</em>
        </b>
        </label>
        </div>
        <div id="anotherInstition" class="form-group">
        <div class="row">
            <div class="col-3">
            <label for="">Sigla</label>
            <input name="sigla" type="text" class="form-control @error('professorbond') is-invalid @enderror " title="Sigla/Acronym of the Institution" placeholder="Sigla/Acronym of the Institution" autocomplete="off" size="20">
            @error('sigla')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-9">
            <label for="">Nome Instituição</label>
            <input name="instituion" type="text" class="form-control @error('professorbond') is-invalid @enderror " title="Nome da Instituição/Name of the Institution" placeholder="Nome da Instituição/Name of the Institution" autocomplete="off" size="100"><br>
            @error('instituion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        </div>
        <hr>
        <div class="form-group mb-2">
        <label for="">
        <b>
            Prezado Professor, favor preencher os dados da tabela abaixo, segundo a avaliação que faz do candidato<br/><em>Dear Referee, please fill in the fields in the table below, according to your assessment of the candidate</em>
        </b>
        </label>
        <div class="row">
        <div class="col-4 border-end"  style="width: 38.9%;"></div>
        <div class="col-2" style="width: 9.9%;">
        <p>5% superior (Muito bom)</p>
        <p> <em>Top 5% (Very good)</em></p>
        </div>
        <div class="col-2" style="width: 10.9%;">
        <p>Entre 20-5% (Bom)</p>
        <p><em>Top 5-20% (Good)</em></p>
        </div>
        <div class="col-2"  style="width: 11.9%;">
        <p>Entre 50-20% (Regular)</p>
        <p><em>Top 20-50% (Fair)</em></p>
        </div>
        <div class="col-2" style="width: 10.9%;">
        <p>50% inferior (Fraco)</p>
        <p><em>Bottom 50% (Weak)</em></p>
        </div>
        <div class="col-2"  style="width: 10.9%;">
        <p>Não conheço</p>
        <br>
        <p><em>I do not know</em></p>
        </div>
        </div>
        <div class="row">
        <div class="col-4  border-end border-top"  style="width: 38.9%;">
        Domínio da área de atuação<br>
        <em>Skills in the domain of interest</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 9.9%;">
        <input type="radio" name="formulario[dominio]" class="form-check-input" id="radio1" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[dominio]" class="form-check-input" id="radio2" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 11.9%;">
        <input type="radio" name="formulario[dominio]" class="form-check-input" id="radio3" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[dominio]" class="form-check-input" id="radio4" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 10.9%;">
        <input type="radio" name="formulario[dominio]" class="form-check-input" id="radio5" value="0">
        </div>
        </div>
        <div class="row">
        <div class="col-4 pl-0 border-end border-top"  style="width: 38.9%;">
        Capacidade intelectual<br>
        <em>Intellectual capacity</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 9.9%;">
        <input type="radio" name="formulario[intelectual]" class="form-check-input" id="radio6" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[intelectual]" class="form-check-input" id="radio7" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 11.9%;">
        <input type="radio" name="formulario[intelectual]" class="form-check-input" id="radio8" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[intelectual]" class="form-check-input" id="radio9" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 10.9%;">
        <input type="radio" name="formulario[intelectual]" class="form-check-input" id="radio10" value="0">
        </div>
        </div>
        <div class="row">
        <div class="col-4 pl-0 border-end border-top"  style="width: 38.9%;">
        Iniciativa<br>
        <em>Initiative</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 9.9%;">
        <input type="radio" name="formulario[iniciativa]" class="form-check-input" id="radio11" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[iniciativa]" class="form-check-input border-top" id="radio12" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 11.9%;">
        <input type="radio" name="formulario[iniciativa]" class="form-check-input border-top" id="radio13" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[iniciativa]" class="form-check-input" id="radio14" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 10.9%;">
        <input type="radio" name="formulario[iniciativa]" class="form-check-input" id="radio15" value="0">
        </div>
        </div>
        <div class="row">
        <div class="col-4 pl-0 border-end border-top"  style="width: 38.9%;">
        Capacidade de comunicação oral<br>
            <em>Oral communication skills</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 9.9%;">
        <input type="radio" name="formulario[comunicacao_oral]" class="form-check-input" id="radio16" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_oral]" class="form-check-input" id="radio17" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 11.9%;">
        <input type="radio" name="formulario[comunicacao_oral]" class="form-check-input" id="radio18" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_oral]" class="form-check-input" id="radio19" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_oral]" class="form-check-input" id="radio20" value="0">
        </div>
        </div>
        <div class="row">
        <div class="col-4 pl-0 border-end border-top"  style="width: 38.9%;">
        Capacidade de comunicação escrita<br>
            <em>Written communication skills</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 9.9%;">
        <input type="radio" name="formulario[comunicacao_escrita]" class="form-check-input" id="radio21" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_escrita]" class="form-check-input" id="radio22" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 11.9%;">
        <input type="radio" name="formulario[comunicacao_escrita]" class="form-check-input" id="radio23" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top" style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_escrita]" class="form-check-input" id="radio24" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top"  style="width: 10.9%;">
        <input type="radio" name="formulario[comunicacao_escrita]" class="form-check-input" id="radio25" value="0">
        </div>
        </div>
        <div class="row">
        <div class="col-4 pl-0 border-end border-top border-bottom"  style="width: 38.9%;">
        Relaciomento com o grupo de trabalho<br>
            <em>Interpersonal skills with other members of the  work group</em>
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top border-bottom" style="width: 9.9%;">
        <input type="radio" name="formulario[relacionamento]" class="form-check-input" id="radio26" value="1">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top border-bottom" style="width: 10.9%;">
        <input type="radio" name="formulario[relacionamento]" class="form-check-input" id="radio27" value="2">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top border-bottom"  style="width: 11.9%;">
        <input type="radio" name="formulario[relacionamento]" class="form-check-input" id="radio28" value="3">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top border-bottom" style="width: 10.9%;">
        <input type="radio" name="formulario[relacionamento]" class="form-check-input" id="radio29" value="4">
        </div>
        <div class="col-2 px-0 d-flex justify-content-center align-items-center border-top border-bottom"  style="width: 10.9%;">
        <input type="radio" name="formulario[relacionamento]" class="form-check-input" id="radio30" value="0">
        </div>
        </div>
        </div>
        <div class="form-group mb-2">
        <label for="">
        <b>
        Outras informações que julgue conveniente fornecer a respeito do candidato<br>
        <em>Further information about the candidate which  you may deem appropriate to include</em>
        </b>
        </label>

        <textarea name="formulario[observacao]" maxlength="4500" class="form-control" cols="90" rows="9" required></textarea><br>
        </div>
        
    <button type="submit" class="btn btn-primary">Salvar / Save</button>
    </div>
</form>
<script type="text/javascript">
var d = document.getElementById('anotherInstition');
var e = document.getElementById('textObserv');
d.style.display = 'none';
var instituionSelect = function () {
    let value = document.getElementById('valueInstituion').value;
    if (value == "0") {
        d.style.display = '';
    } else {
        d.style.display = 'none';
    }
}

if (!('maxLenght' in e)) {
    let max = el.attributes.maxLength.value;
    el.onkeypress = function () {
        if (this.value.lenght >= max) return false;
    }
}

</script>
@endsection