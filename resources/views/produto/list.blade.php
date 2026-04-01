@extends('main')
@section('titulo', 'Listagem de Produtos')
@section('content')

<h4>Listagem de Produtos</h4>

<div class="row">
    <div class="col">
        <form action="{{ route('produto.search') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="descricao">Descrição</option>
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
                    <a href="{{ url('produto/create') }}" class="btn btn-success">Novo</a>
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
            <th>Preço</th>
            <th>Descrição</th>
            <th>Categoria</th>
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
                     style="object-fit: cover; border-radius: 10px;">
            </td>

            <td>{{ $item->nome }}</td>
            <td>R$ {{ $item->preco }}</td>
            <td>{{ $item->descricao }}</td>
            <td>{{ $item->categoria->nome ?? '' }}</td>

            <td>
                <a href="{{ route('produto.edit', $item->id) }}" class="btn btn-warning">
                    Editar
                </a>
            </td>

            <td>
                <form action="{{ route('produto.destroy', $item->id) }}" method="post">
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