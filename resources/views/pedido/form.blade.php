@extends('main')
@section('titulo', 'Formulário Pedido')
@section('content')

<h4>Formulário Pedido</h4>

@php
    if (!empty($dado->id)) {
        $action = route('pedido.update', $dado->id);
    } else {
        $action = route('pedido.store');
    }
@endphp

<form action="{{ $action }}" method="POST">
    @csrf

    @if (!empty($dado->id))
        @method('PUT')
    @endif

    <div class="row">
        <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">

        <div class="col">
            <label class="form-label">Cliente</label>
            <input type="text" class="form-control" name="cliente"
                value="{{ old('cliente', $dado->cliente ?? '') }}">
        </div>

        <div class="col">
            <label class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade"
                value="{{ old('quantidade', $dado->quantidade ?? '') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label class="form-label">Produto</label>
            <select name="produto_id" class="form-select">
                @foreach ($produtos as $item)
                    <option value="{{ $item->id }}"
                        {{ old('produto_id', $dado->produto_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col">
            <label class="form-label">Funcionário</label>
            <select name="funcionario_id" class="form-select">
                @foreach ($funcionarios as $item)
                    <option value="{{ $item->id }}"
                        {{ old('funcionario_id', $dado->funcionario_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('pedido') }}" class="btn btn-primary">Voltar</a>

</form>

@stop