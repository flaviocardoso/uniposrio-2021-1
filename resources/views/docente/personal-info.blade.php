@extends('layout.layout')

@section('content')

<div class="container">
<p>Alterar Dados Pessoais / <em>Fill in Personal Data</em></p>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') ?? '' }}
    </div>
@endif
<form method="post">
@csrf
<div class="form-group mb-2">
<label>Nacionalidade</label>
<div class="form-check">
    <input type="radio" name="nacionalidade" class="form-check-input" id="nacionalidade" value="Brasileiro" {{ (old('nacionalidade', $personalinfo->nacionalidade ?? '') == 'Brasileiro') ? 'checked' : '' }} >
    <label class="form-check-label" for="nacionalidade">Brasileiro/Brazilian</label>
</div>
<div class="form-check">
    <input type="radio" name="nacionalidade" class="form-check-input" id="estrangeiro" value="Estrangeiro"  {{ (old('nacionalidade', $personalinfo->nacionalidade ?? '') == 'Estrangeiro') ? 'checked' : '' }} >
    <label class="form-check-label" for="estrangeiro">Estrangeiro/Foreign</label>
</div>
@error('nacionalidade')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="row mb-2">
<div class="form-group col-3">
    <label for="cpf">CPF</label>
    <input name="cpf" type="text" value="{{ old('cpf', $personalinfo->cpf ?? '' ) }}" pattern="\d{3}\.\d{3}\.\d{3}\-\d{2}" class="form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="CPF" size="20" title="CPF">
    @error('cpf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-3">
    <label for="passaporte">Passaporte</label>
    <input name="passaporte" type="text" id="passaporte" class="form-control @error('passaporte') is-invalid @enderror" placeholder="Passaporte/Passport" size="20" value="{{ old('passaporte', $personalinfo->passaporte ?? 'Não tenho') }}" title="Passaporte">
    @error('passaporte')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
<div class="form-group col-6 mb-2">
    <label for="instituion">Instituição</label>
	<select name="instituion" onchange="instituionSelect()" id="valueInstituion" class="form-control @error('instituion') is-invalid @enderror">
    	<option>Preencha a instituição</option>
        @if ($instituions)
        @foreach($instituions as $instituion)
        <option value="{{ $instituion['sigla'] }}|{{ $instituion['nome'] }}" {{ (old('instituion', ($personalinfo->instituion['sigla'] ?? '') . '|' . ($personalinfo->instituion['nome'] ?? '')) == $instituion['sigla'] . '|' . $instituion['nome']) ? 'selected' : '' }}>{{ $instituion['sigla'] }} - {{ $instituion['nome'] }}</option>
        @endforeach
        @endif
        <option value="0" {{ (old('instituion') == '0') ? 'selected' : '' }} >Outro, Preencha os campos 'Sigla' e 'Nome Instituição' abaixo / Other, Fill in the fields 'Acronym' and 'Name Institution' below</option>
    </select>
    <div id="anotherInstition" class="mt-2">
        Preencha abaixo sigla e instituição
        <div class="col-6">
        <label for="instSigla">Sigla</label>
        <input type="text" name="instituionsigla" value="{{ old('instituionsigla') }}" id="instSigla" class="form-control @error('instituionsigla') is-invalid @enderror" placeholder="SIGLA/Acronym" size="10"/>
        @error('instituionsigla')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-12">
        <label for="instNome">Nome da Instituição</label>
        <input type="text" name="instituionnome" value="{{ old('instituionnome') }}" id="instNome" class="form-control @error('instituionnome') is-invalid @enderror" placeholder="Nome Instituição/Name Institution" size="80" />
        @error('instituionnome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    @error('instituion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-6 mb-2">
    <label for="departament">Departamento</label>
    <input name="departament" value="{{ old('departament', $personalinfo->departament ?? '' ) }}" class="form-control @error('departament') is-invalid @enderror" type="text" id="departament" placeholder="Departamento" size="30">
    @error('departament')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-6 mb-2">
    <label for="bond">Vinculo Empregatício</label>
    <input name="bond" value="{{ old('bond', $personalinfo->bond ?? '' ) }}" class="form-control @error('bond') is-invalid @enderror" type="text" id="bond" placeholder="Vinculo" size="30">
    @error('bond')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-6 mb-2">
    <label for="phone">Telefone Celular</label>
    <input name="phone" value="{{ old('phone', $personalinfo->phone ?? '' ) }}" class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" placeholder="Telefone Celular" size="30">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
</form>
</div>
<script type="text/javascript">
var d = document.getElementById('anotherInstition');
d.style.display = 'none';
var instituionSelect = function () {
    var value = document.getElementById('valueInstituion').value;
    if (value == "0") {
        d.style.display = '';
    } else {
        d.style.display = 'none';
    }
}

if (document.getElementById('valueInstituion').value == '0') {
    d.style.display = '';
}
</script>
@endsection