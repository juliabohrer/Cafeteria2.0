@extends('main')
@section('titulo', 'Listagem Fornecedor')
@section('content')

<h4 class="mb-4 fw-bold">
    Fornecedores
</h4>


<form method="GET" action="{{ route('fornecedor.search') }}">

    <div class="row mb-4">

        <div class="col-md-3">

            <select name="tipo"
                    class="form-select shadow-sm">

                <option value="nome">
                    Nome
                </option>

                <option value="cnpj">
                    CNPJ
                </option>

                <option value="telefone">
                    Telefone
                </option>

            </select>

        </div>

        <div class="col-md-6">

            <input type="text"
                   name="valor"
                   class="form-control shadow-sm"
                   placeholder="Buscar fornecedor...">

        </div>

        <div class="col-md-3 d-grid">

            <button class="btn btn-primary">

                Buscar

            </button>

        </div>

    </div>

</form>


<div class="d-flex gap-2 mb-4 flex-wrap">

    <a href="{{ route('fornecedor.create') }}"
       class="btn btn-success shadow-sm">

        Novo Fornecedor

    </a>

</div>



<div class="table-responsive">

    <table class="table table-hover align-middle shadow-sm">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Nome</th>

                <th>CNPJ</th>

                <th>Telefone</th>

                <th width="220">
                    Ações
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($dados as $f)

            <tr>

                <td class="fw-bold">
                    {{ $f->id }}
                </td>

                <td>
                    {{ $f->nome }}
                </td>

                <td>
                    {{ $f->cnpj }}
                </td>

                <td>
                    {{ $f->telefone }}
                </td>

                <td>

                    <div class="d-flex gap-2">

                        <a href="{{ route('fornecedor.edit', $f->id) }}"
                           class="btn btn-warning btn-sm">

                            Editar

                        </a>

                        <form action="{{ route('fornecedor.destroy', $f->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Excluir fornecedor?')">

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