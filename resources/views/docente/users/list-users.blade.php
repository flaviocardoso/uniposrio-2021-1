@extends('layout.layout')

@section('content')

<div class="container mt-4">
    <p>Edite Usuários</p>
    <table class="table">
    <thead>
    <tr>
    <th scope="col">User</th>
    <th scope="col">Nome</th>
    <th scope="col">Email</th>
    <th scope="col">Admin</th>
    <th scope="col">Comissão</th>
    <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($listusercollaborator as $usercollaborator)
    <td>
    <span onclick="toggleInput('user', {{ $usercollaborator->id }})" id="user-collaborator-{{ $usercollaborator->id }}">
    {{ $usercollaborator->user }}
    </span>
    <div class="input-group" hidden id="input-user-collaborator-{{ $usercollaborator->id }}">
    <input type="text" class="form-control" value="{{ $usercollaborator->user }}" ondblclick="edit(event, 'user', {{ $usercollaborator->id }})">
    @csrf
    </div>
    </td>
    <td>
    <span onclick="toggleInput('nome', {{ $usercollaborator->id }})" id="nome-collaborator-{{ $usercollaborator->id }}">
    {{ $usercollaborator->name }}
    </span>
    <div class="input-group" hidden id="input-nome-collaborator-{{ $usercollaborator->id }}">
    <input type="text" class="form-control" value="{{ $usercollaborator->name }}" ondblclick="edit(event,'nome', {{ $usercollaborator->id }})">
    @csrf
    </div>
    </td>
    <td>
    <span onclick="toggleInput('email', {{ $usercollaborator->id }})" id="email-collaborator-{{ $usercollaborator->id }}">
    {{ $usercollaborator->email }}
    </span>
    <div class="input-group" hidden id="input-email-collaborator-{{ $usercollaborator->id }}">
    <input type="text" class="form-control" value="{{ $usercollaborator->email }}" ondblclick="edit(event, 'email', {{ $usercollaborator->id }})">
    @csrf
    </div>
    </td>
    <td>
    <input type="checkbox">
    </td>
    <td>
    <input type="checkbox">
    </td>
    <td>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-envelope" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
    </svg>
    |
    <a href="{{ route('collaborator.dashboard.collaborator.personal-info', $usercollaborator->id ) }}" title="Edite Infomações Pessoais">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-info-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
    </svg>
    </a>
    | 
    @if (!$usercollaborator->active)
    <a href="{{ route('collaborator.dashboard.collaborator.active', $usercollaborator->id) }}" title="Desative Usuário">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    </a>
    @else
    <a href="{{ route('collaborator.dashboard.collaborator.active', $usercollaborator->id) }}" title="Ative Usuário">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
    </svg>
    </a>
    @endif
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $listusercollaborator->links('layout.paginate') }}
    </div>
</div>

<script>
    // function toggleInput(serieId) {
    //     const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
    //     const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
    //     if (nomeSerieEl.hasAttribute('hidden')) {
    //         nomeSerieEl.removeAttribute('hidden');
    //         inputSerieEl.hidden = true;
    //     } else {
    //         inputSerieEl.removeAttribute('hidden');
    //         nomeSerieEl.hidden = true;
    //     }
    // }

    function toggleInput(c, id) {
        // alert(`${c}-collaborator-${id}`);
        const text = document.getElementById(`${c}-collaborator-${id}`);
        const input = document.getElementById(`input-${c}-collaborator-${id}`);
        const focus = document
            .querySelector(`#input-${c}-collaborator-${id} > input`);
        
        if (text.hasAttribute('hidden')) {
            text.removeAttribute('hidden');
            input.hidden = true;
        } else {
            input.removeAttribute('hidden');
            focus.focus();
            text.hidden = true;
        }
    }

    function edit(e, c, id) {
        // let formData = new FormData();
        // if (e.keyCode == 13 || e.which == 13) {
            const text = document
            .querySelector(`#input-${c}-collaborator-${id} > input`)
            .value;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
            let formData = new FormData();
            formData.append(`${c}`, text);
            formData.append('_token', token);

            const url = `/collaborator/collaborators/${id}/${c}`;
            // console.log(url);
            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(c, id);
                document.getElementById(`${c}-collaborator-${id}`).textContent = text;
            });
        // }
    }

    function toggleAtive(e, id) {
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        let formData = new FormData();
        formData.append('_token', token);
        const url = `/collaborator/collaborators/${id}/toggleactive`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {

        });

    }

    function editarSerie(serieId) {
        let formData = new FormData();
        const nome = document
            .querySelector(`#input-nome-serie-${serieId} > input`)
            .value;
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('nome', nome);
        formData.append('_token', token);
        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>

@endsection