@extends('main')
@section('titulo', 'Formulário Produto')
@section('content')

<h4>Formulário Produto</h4>

@php
    if (!empty($dado->id)) {
        $action = route('produto.update', $dado->id);
    } else {
        $action = route('produto.store');
    }

    $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.png';
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if (!empty($dado->id))
        @method('PUT')
    @endif

    <div class="row">
        <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">

        <div class="col">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control"
                value="{{ old('nome', $dado->nome ?? '') }}">
        </div>

        <div class="col">
            <label>Preço</label>
            <input type="text" name="preco" class="form-control"
                value="{{ old('preco', $dado->preco ?? '') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control"
                value="{{ old('descricao', $dado->descricao ?? '') }}">
        </div>

        <div class="col">
            <label>Categoria</label>
            <select name="categoria_id" class="form-select">
                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}"
                        {{ old('categoria_id', $dado->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Imagem</label><br>

            <img src="{{ asset('storage/' . $nome_imagem) }}"
                 width="150"
                 height="150"
                 style="object-fit: cover; border-radius: 10px;">

            <input type="file" name="imagem" class="form-control mt-2">
        </div>
    </div>

    <br>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ url('produto') }}" class="btn btn-primary">Voltar</a>

</form>

@stop