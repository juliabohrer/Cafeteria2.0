@extends('main')
@section('titulo', 'Formulário Produto')
@section('content')

<h4>Formulário Produto</h4>

@php
    $action = !empty($dado->id)
        ? route('produto.update', $dado->id)
        : route('produto.store');

    $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.png';
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        Preencha os campos obrigatórios!
    </div>
@endif

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if (!empty($dado->id))
        @method('PUT')
    @endif

    <div class="row">
        <div class="col">
            <label>Nome *</label>

            <input type="text"
                name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', $dado->nome ?? '') }}"
                required>

            @error('nome')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>

        <div class="col">
            <label>Preço *</label>

            <input type="text"
                name="preco"
                class="form-control @error('preco') is-invalid @enderror"
                value="{{ old('preco', $dado->preco ?? '') }}"
                required>

            @error('preco')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Descrição *</label>

            <input type="text"
                name="descricao"
                class="form-control @error('descricao') is-invalid @enderror"
                value="{{ old('descricao', $dado->descricao ?? '') }}"
                required>

            @error('descricao')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>

        <div class="col">
            <label>Categoria *</label>

            <select name="categoria_id"
                class="form-select @error('categoria_id') is-invalid @enderror"
                required>

                <option value="">Selecione</option>

                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}"
                        {{ old('categoria_id', $dado->categoria_id ?? '') == $item->id ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>

            @error('categoria_id')
                <small class="text-danger">Selecione uma categoria</small>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Fornecedor *</label>

            <select name="fornecedor_id"
                class="form-select @error('fornecedor_id') is-invalid @enderror"
                required>

                <option value="">Selecione</option>

                @foreach ($fornecedores as $f)
                    <option value="{{ $f->id }}"
                        {{ old('fornecedor_id', $dado->fornecedor_id ?? '') == $f->id ? 'selected' : '' }}>
                        {{ $f->nome }}
                    </option>
                @endforeach
            </select>

            @error('fornecedor_id')
                <small class="text-danger">Selecione um fornecedor</small>
            @enderror
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