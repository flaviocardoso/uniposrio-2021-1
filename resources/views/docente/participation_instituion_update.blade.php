@extends('layout.layout')

@section('content')
<p>
@if ($participation_instituion->module == 'M') 
    MESTRADO </a>
@endif
@if ($participation_instituion->module == 'D') 
    DOUTORADO</a>
@endif
</p>
<form method="post">
        @csrf
        @method('put')
        <input type="hidden" name="module" id="module" required class="form-control" value="{{ $participation_instituion->module }}">
    <div class="form-goup">
        <label for="instituion">Instituções</label>
        <div class="row">
            <div class="col">Sigla</div>
            <div class="col">Instituição</div>
        </div>
        <div id="fieldInstituion">
            @for ($i=0; $i < count($participation_instituion->instituions); $i++)
            <div class="row">
                <div class="col-4">
                    <input type="text" name="instituions[{{ $i }}][sigla]" value="{{ $participation_instituion->instituions[$i]['sigla'] ?? '' }}" class="form-control"> 
                </div>
                <div class="col">
                    <input type="text" name="instituions[{{ $i }}][nome]" value="{{ $participation_instituion->instituions[$i]['nome'] ?? '' }}" class="form-control">    
                </div>
                <div class="col-3">
                    <button type="button" class="btn" onclick="deleteField(this)">Apagar</a>
                </div>
            </div>
            @endfor
        </div>
        
        <button type="button" id="addField">Adiconar Instituição</button>
    </div>
    <button type="submit" class="btn btn-primary mt-3">
        Atualizar
    </button>
</form>
</div>
<script>
    var wrapper = document.getElementById("fieldInstituion");
    var qtdInic = wrapper.childElementCount;

    var btnAdd = document.getElementById("addField");
    var btnDelete = document.getElementById("deleteField");

    btnAdd.onclick = function (e) {
        e.preventDefault();
        
        qtdInic += 1;
        var row = document.createElement('div');
        row.className = "row";
        var col4 = document.createElement('div');
        col4.className = "col-4";
        var col = document.createElement('div');
        col.className = "col";
        var col3 = document.createElement('div');
        col3.className = "col-3";

        var inputSigla = document.createElement('input');
        inputSigla.setAttribute("type", "text");
        inputSigla.setAttribute("name", 'instituions[' + qtdInic + '][sigla]');
        inputSigla.className = "form-control";

        var inputNome = document.createElement('input');
        inputNome.setAttribute("type", "text");
        inputNome.setAttribute("name", 'instituions[' + qtdInic + '][nome]');
        inputNome.className = "form-control";

        var button = document.createElement('button');
        button.setAttribute("type", "button");
        button.setAttribute("id", "deleteField");
        button.className = "btn";

        button.onclick = function () {
            this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
        }
        button.append("Apagar");

        col4.appendChild(inputSigla);
        col.appendChild(inputNome);
        col3.appendChild(button);

        row.appendChild(col4);
        row.appendChild(col);
        row.appendChild(col3);

        wrapper.append(row);
    };
    
    function deleteField (e) {
        wrapper.removeChild(e.parentNode.parentNode);
        qtdInic += 1;
    }



</script>
@endsection