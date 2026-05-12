@extends('main')
@section('titulo', 'Formulário Pedido')
@section('content')

<h4>Formulário Pedido</h4>

@php
    $action = !empty($dado->id)
        ? route('pedido.update', $dado->id)
        : route('pedido.store');
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        Preencha os campos obrigatórios!
    </div>
@endif

<form action="{{ $action }}" method="POST">

    @csrf

    @if (!empty($dado->id))
        @method('PUT')
    @endif

    <div class="row">

        <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">

        <div class="col">

            <label>Cliente *</label>

            <input type="text"
                name="cliente"
                class="form-control @error('cliente') is-invalid @enderror"
                value="{{ old('cliente', $dado->cliente ?? '') }}"
                required>

            @error('cliente')
                <small class="text-danger">Campo obrigatório</small>
            @enderror

        </div>

        <div class="col">

            <label>Funcionário *</label>

            <select name="funcionario_id"
                class="form-select @error('funcionario_id') is-invalid @enderror"
                required>

                <option value="">Selecione</option>

                @foreach($funcionarios as $f)
                    <option value="{{ $f->id }}"
                        {{ old('funcionario_id', $dado->funcionario_id ?? '') == $f->id ? 'selected' : '' }}>
                        {{ $f->nome }}
                    </option>
                @endforeach

            </select>

            @error('funcionario_id')
                <small class="text-danger">Selecione um funcionário</small>
            @enderror

        </div>

    </div>

    <hr>

    <h5>Itens do Pedido</h5>

    <table class="table table-bordered" id="tabela-itens">

        <thead>
            <tr>
                <th>Produto</th>
                <th width="150">Quantidade</th>
                <th width="180">Valor Unitário</th>
                <th width="180">Subtotal</th>
                <th width="100">Ação</th>
            </tr>
        </thead>

        <tbody>

        @if(!empty($dado->itens))

            @foreach($dado->itens as $index => $item)

            <tr>

                <td>
                    <select name="itens[{{ $index }}][produto_id]"
                        class="form-select produto"
                        required>

                        <option value="">Selecione</option>

                        @foreach($produtos as $produto)

                            <option value="{{ $produto->id }}"
                                data-preco="{{ $produto->preco }}"
                                {{ $item->produto_id == $produto->id ? 'selected' : '' }}>
                                {{ $produto->nome }}
                            </option>

                        @endforeach

                    </select>
                </td>

                <td>
                    <input type="number"
                        name="itens[{{ $index }}][quantidade]"
                        class="form-control quantidade"
                        value="{{ $item->quantidade }}"
                        min="1"
                        required>
                </td>

                <td>
                    <input type="text"
                        class="form-control valor"
                        value="R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}"
                        readonly>
                </td>

                <td>
                    <input type="text"
                        class="form-control subtotal"
                        value="R$ {{ number_format($item->subtotal, 2, ',', '.') }}"
                        readonly>
                </td>

                <td>
                    <button type="button" class="btn btn-danger remover-item">
                        Remover
                    </button>
                </td>

            </tr>

            @endforeach

        @else

        <tr>

            <td>
                <select name="itens[0][produto_id]" class="form-select produto" required>
                    <option value="">Selecione</option>

                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                            {{ $produto->nome }}
                        </option>
                    @endforeach

                </select>
            </td>

            <td>
                <input type="number"
                    name="itens[0][quantidade]"
                    class="form-control quantidade"
                    value="1"
                    min="1"
                    required>
            </td>

            <td><input type="text" class="form-control valor" readonly></td>
            <td><input type="text" class="form-control subtotal" readonly></td>

            <td>
                <button type="button" class="btn btn-danger remover-item">
                    Remover
                </button>
            </td>

        </tr>

        @endif

        </tbody>

    </table>

    <button type="button" class="btn btn-secondary" id="adicionar-item">
        + Adicionar Item
    </button>

    <div class="mt-4">
        <h4>Total: <span id="total-geral">R$ 0,00</span></h4>
    </div>

    <br>

    <button class="btn btn-success">Salvar</button>

    <a href="{{ url('pedido') }}" class="btn btn-primary">Voltar</a>

</form>

<script>

let index = {{ !empty($dado->itens) ? count($dado->itens) : 1 }};

document.getElementById('adicionar-item').addEventListener('click', function () {

    let linha = `
    <tr>

        <td>
            <select name="itens[${index}][produto_id]" class="form-select produto" required>
                <option value="">Selecione</option>

                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" data-preco="{{ $produto->preco }}">
                        {{ $produto->nome }}
                    </option>
                @endforeach

            </select>
        </td>

        <td>
            <input type="number" name="itens[${index}][quantidade]" class="form-control quantidade" value="1" min="1" required>
        </td>

        <td><input type="text" class="form-control valor" readonly></td>

        <td><input type="text" class="form-control subtotal" readonly></td>

        <td>
            <button type="button" class="btn btn-danger remover-item">Remover</button>
        </td>

    </tr>`;

    document.querySelector('#tabela-itens tbody').insertAdjacentHTML('beforeend', linha);

    index++;

});

document.addEventListener('change', function(e){

    if (e.target.classList.contains('produto') || e.target.classList.contains('quantidade')) {

        atualizarTabela();

    }

});

document.addEventListener('click', function(e){

    if (e.target.classList.contains('remover-item')) {

        e.target.closest('tr').remove();

        atualizarTabela();

    }

});

function atualizarTabela() {

    let total = 0;

    document.querySelectorAll('#tabela-itens tbody tr').forEach(function(linha){

        let produto = linha.querySelector('.produto');

        let quantidade = linha.querySelector('.quantidade');

        let option = produto.options[produto.selectedIndex];

        let preco = option.getAttribute('data-preco');

        if (preco) {

            let sub = parseFloat(preco) * parseFloat(quantidade.value);

            linha.querySelector('.valor').value = 'R$ ' + parseFloat(preco).toFixed(2);

            linha.querySelector('.subtotal').value = 'R$ ' + sub.toFixed(2);

            total += sub;

        }

    });

    document.getElementById('total-geral').innerHTML = 'R$ ' + total.toFixed(2);

}

atualizarTabela();

</script>

@stop