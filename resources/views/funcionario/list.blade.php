@extends('main')
@section('titulo', 'Listagem de Funcionários')
@section('content')

<h4>Listagem de Funcionários</h4>

<div class="row">
    <div class="col">
        <form action="{{ route('funcionario.search') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="Buscar...">
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary">Buscar</button>
                </div>

                <div class="col-md-3">
                    <a href="{{ url('funcionario/create') }}" class="btn btn-success">Novo</a>
                </div>
            </div>
        </form>
    </div>
</div>

<br>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Horário</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($dados as $item)

        @php
            $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.png';
        @endphp

        <tr>
            <td>{{ $item->id }}</td>

            <td>
                <img src="{{ asset('storage/' . $nome_imagem) }}"
                     width="100"
                     height="100"
                     style="object-fit: cover; border-radius: 50%;">
            </td>

            <td>{{ $item->nome }}</td>
            <td>{{ $item->cpf }}</td>
            <td>{{ $item->endereco }}</td>
            <td>{{ $item->horario }}</td>

            <td>
                <a href="{{ route('funcionario.edit', $item->id) }}" class="btn btn-warning">
                    Editar
                </a>
            </td>

            <td>
                <form action="{{ route('funcionario.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                        onclick="return confirm('Deseja remover?')">
                        Deletar
                    </button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@stop