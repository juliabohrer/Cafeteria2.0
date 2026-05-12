@extends('main')

@section('titulo', 'Listagem de Entregas')

@section('content')

<h4>Listagem de Entregas</h4>

<form method="GET" action="{{ route('entrega.search') }}">

    <div class="row mb-3">

        {{-- TIPO DE BUSCA --}}
        <div class="col-md-3">

            <select name="tipo" class="form-control">

                <option value="pedido">Pedido</option>
                <option value="endereco">Endereço</option>

            </select>

        </div>

        <div class="col-md-6">

            <input type="text"
                   name="valor"
                   class="form-control"
                   placeholder="Buscar entrega...">

        </div>

        <div class="col-md-3 d-grid">

            <button class="btn btn-primary">
                Buscar
            </button>

        </div>

    </div>

</form>

<a href="{{ route('entrega.create') }}" class="btn btn-success mb-3">
    Nova Entrega
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-hover table-bordered align-middle">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Pedido</th>
            <th>Cliente</th>
            <th>Endereço</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

    </thead>

    <tbody>

        @foreach($dados as $d)

        <tr>

            {{-- ID --}}
            <td>{{ $d->id }}</td>

            {{-- PEDIDO --}}
            <td>
                Pedido #{{ $d->pedido_id }}
            </td>

            {{-- CLIENTE --}}
            <td>
                {{ $d->pedido->cliente ?? 'Sem cliente' }}
            </td>

            {{-- ENDEREÇO --}}
            <td>
                {{ $d->endereco }}
            </td>

            {{-- STATUS --}}
            <td>

                @if($d->status == 'pendente')

                    <span class="badge bg-warning text-dark">
                        Pendente
                    </span>

                @elseif($d->status == 'enviado')

                    <span class="badge bg-primary">
                        Enviado
                    </span>

                @else

                    <span class="badge bg-success">
                        Entregue
                    </span>

                @endif

            </td>

            {{-- AÇÕES --}}
            <td>

                <div class="d-flex gap-2">

                    {{-- EDITAR --}}
                    <a href="{{ route('entrega.edit', $d->id) }}"
                       class="btn btn-warning btn-sm flex-fill">
                        Editar
                    </a>

                    {{-- EXCLUIR --}}
                    <form method="POST"
                          action="{{ route('entrega.destroy', $d->id) }}"
                          class="flex-fill">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm w-100"
                                onclick="return confirm('Deseja excluir esta entrega?')">

                            Excluir

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection