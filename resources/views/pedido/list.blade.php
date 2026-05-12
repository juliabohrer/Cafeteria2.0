@extends('main')
@section('titulo', 'Listagem Pedido')
@section('content')

<h4>Listagem de Pedidos</h4>

<!-- BUSCA -->

<form method="GET" action="{{ route('pedido.search') }}">

    <div class="row mb-3">

        {{-- TIPO BUSCA --}}
        <div class="col-md-3">

            <select name="tipo" class="form-control">

                <option value="cliente">
                    Cliente
                </option>

                <option value="id">
                    ID
                </option>

            </select>

        </div>

        {{-- VALOR --}}
        <div class="col-md-6">

            <input type="text"
                   name="valor"
                   class="form-control"
                   placeholder="Buscar pedido por cliente ou ID...">

        </div>

        {{-- BOTÃO --}}
        <div class="col-md-3 d-grid">

            <button class="btn btn-primary">

                Buscar

            </button>

        </div>

    </div>

</form>

<!-- BOTÕES -->

<div class="d-flex gap-2 mb-3 flex-wrap">

    {{-- NOVO PEDIDO --}}
    <a href="{{ route('pedido.create') }}"
       class="btn btn-success">

        Novo Pedido

    </a>

    {{-- GRÁFICOS --}}
    <a href="{{ route('pedido.graficos') }}"
       class="btn btn-dark">

        Ver Gráficos

    </a>

    {{-- PDF --}}
    <a href="{{ route('pdf.pedidos') }}"
       class="btn btn-danger">

        PDF Pedidos

    </a>

</div>

<!-- ===================================================== -->
<!-- TABELA -->
<!-- ===================================================== -->

<table class="table table-hover table-bordered align-middle">

    <thead class="table-dark">

        <tr>

            <th width="70">
                ID
            </th>

            <th width="180">
                Cliente
            </th>

            <th width="180">
                Funcionário
            </th>

            <th>
                Itens
            </th>

            <th width="140">
                Total
            </th>

            <th width="220">
                Endereço
            </th>

            <th width="140">
                Status
            </th>

            <th width="180">
                Ações
            </th>

        </tr>

    </thead>

    <tbody>

        @foreach($dados as $pedido)

        <tr>

            {{-- ID --}}
            <td>

                {{ $pedido->id }}

            </td>

            {{-- CLIENTE --}}
            <td>

                <strong>

                    {{ $pedido->cliente }}

                </strong>

            </td>

            {{-- FUNCIONÁRIO --}}
            <td>

                {{ $pedido->funcionario->nome ?? 'Sem funcionário' }}

            </td>

            {{-- ITENS --}}
            <td style="min-width: 320px;">

                @if($pedido->itens->count() > 0)

                    <div class="p-2">

                        @foreach($pedido->itens as $item)

                            <div class="border rounded p-3 mb-2 bg-light shadow-sm">

                                <div class="fw-bold fs-5">

                                    {{ $item->produto->nome ?? '' }}

                                </div>

                                <div class="text-muted">

                                    Quantidade:
                                    {{ $item->quantidade }}

                                </div>

                                <div class="text-success fw-semibold fs-6">

                                    R$
                                    {{ number_format($item->subtotal, 2, ',', '.') }}

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <span class="badge bg-secondary">

                        Sem itens

                    </span>

                @endif

            </td>

            {{-- TOTAL --}}
            <td>

                <span class="badge bg-success fs-6">

                    R$
                    {{ number_format($pedido->total, 2, ',', '.') }}

                </span>

            </td>

            {{-- ENDEREÇO --}}
            <td>

                {{ $pedido->entrega->endereco ?? 'Sem entrega cadastrada' }}

            </td>

            {{-- STATUS --}}
            <td>

                @if(!empty($pedido->entrega))

                    @if($pedido->entrega->status == 'pendente')

                        <span class="badge bg-warning text-dark fs-6">

                            {{ $pedido->entrega->status }}

                        </span>

                    @elseif($pedido->entrega->status == 'enviado')

                        <span class="badge bg-primary fs-6">

                            {{ $pedido->entrega->status }}

                        </span>

                    @else

                        <span class="badge bg-success fs-6">

                            {{ $pedido->entrega->status }}

                        </span>

                    @endif

                @else

                    <span class="badge bg-secondary fs-6">

                        Sem entrega

                    </span>

                @endif

            </td>

            {{-- AÇÕES --}}
            <td>

                <div class="d-flex gap-2">

                    {{-- EDITAR --}}
                    <a href="{{ route('pedido.edit', $pedido->id) }}"
                       class="btn btn-warning flex-fill">

                        Editar

                    </a>

                    {{-- EXCLUIR --}}
                    <form action="{{ route('pedido.destroy', $pedido->id) }}"
                          method="POST"
                          class="flex-fill">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger w-100"
                                onclick="return confirm('Excluir pedido?')">

                            Excluir

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@stop