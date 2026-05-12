@extends('main')
@section('titulo', 'Listagem de Produtos')
@section('content')

<h4 class="mb-4 fw-bold">
    Listagem de Produtos
</h4>


<form method="GET" action="{{ route('produto.search') }}">

    <div class="row mb-4">

        <div class="col-md-3">

            <select name="tipo"
                    class="form-select shadow-sm">

                <option value="nome">
                    Nome
                </option>

                <option value="categoria">
                    Categoria
                </option>

            </select>

        </div>

        <div class="col-md-6">

            <input type="text"
                   name="valor"
                   class="form-control shadow-sm"
                   placeholder="Buscar produto...">

        </div>

        <div class="col-md-3 d-grid">

            <button class="btn btn-primary">

                Buscar

            </button>

        </div>

    </div>

</form>


<div class="d-flex gap-2 mb-4 flex-wrap">

    <a href="{{ url('produto/create') }}"
       class="btn btn-success shadow-sm">

        Novo Produto

    </a>


    <a href="{{ route('pdf.produtos') }}"
       class="btn btn-danger shadow-sm">

        PDF Relatorio

    </a>

</div>



<div class="table-responsive">

    <table class="table table-hover table-bordered align-middle shadow-sm">

        <thead class="table-dark">

            <tr>

                <th width="60">
                    #
                </th>

                <th width="120">
                    Imagem
                </th>

                <th>
                    Nome
                </th>

                <th width="120">
                    Preço
                </th>

                <th>
                    Descrição
                </th>

                <th width="150">
                    Categoria
                </th>

                <th width="180">
                    Fornecedor
                </th>

                <th width="220">
                    Ações
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach ($dados as $item)

            @php

                $nome_imagem =
                    !empty($item->imagem)
                        ? $item->imagem
                        : 'sem_imagem.png';

            @endphp

            <tr>

                <td class="fw-bold">

                    {{ $item->id }}

                </td>

                <td>

                    <img src="{{ asset('storage/' . $nome_imagem) }}"
                         width="100"
                         height="100"
                         style="
                            object-fit: cover;
                            border-radius: 10px;
                         ">

                </td>

                <td>

                    <strong>

                        {{ $item->nome }}

                    </strong>

                </td>

                <td>

                    <span class="badge bg-success fs-6">

                        R$
                        {{ number_format($item->preco, 2, ',', '.') }}

                    </span>

                </td>

                <td>

                    {{ $item->descricao }}

                </td>

                <td>

                    <span class="badge bg-warning text-dark">

                        {{ $item->categoria->nome ?? '' }}

                    </span>

                </td>

                <td>

                    {{ $item->fornecedor->nome ?? 'Sem fornecedor' }}

                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="{{ route('produto.edit', $item->id) }}"
                           class="btn btn-warning btn-sm w-100">

                            Editar

                        </a>

                        <form action="{{ route('produto.destroy', $item->id) }}"
                              method="POST"
                              class="w-100">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100"
                                    onclick="return confirm('Deseja remover?')">

                                Excluir

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@stop