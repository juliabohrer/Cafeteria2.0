@extends('main')
@section('titulo', 'Listagem de Pedidos')
@section('content')

<h4>Listagem de Pedidos</h4>

<div class="row">
    <div class="col">
        <form action="{{ route('pedido.search') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-3">
                    <label class="form-label">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="cliente">Cliente</option>
                        <option value="funcionario">Funcionario</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Valor</label>
                    <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>

                <div class="col-md-3">
                    <a href="{{ url('pedido/create') }}" class="btn btn-success">Novo</a>
                </div>
            </div>
        </form>
    </div>
</div>

<br>

<div class="row">
    <div class="col">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Funcionário</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ação</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->cliente }}</td>
                        <td>{{ $item->produto->nome ?? '' }}</td>
                        <td>{{ $item->funcionario->nome ?? '' }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>R$ {{ $item->total }}</td>

                        <td>
                            <a href="{{ route('pedido.edit', $item->id) }}" class="btn btn-warning">
                                Editar
                            </a>
                        </td>

                        <td>
                            <form action="{{ route('pedido.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Deseja remover o registro?')">
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@stop