@extends('main')
@section('titulo', 'Formulário Fornecedor')
@section('content')

<h4>Formulário Fornecedor</h4>

@php
    $action = !empty($dado->id)
        ? route('fornecedor.update', $dado->id)
        : route('fornecedor.store');
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
        <div class="col">
            <label>Nome *</label>

            <input type="text" name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', $dado->nome ?? '') }}"
                required>

            @error('nome')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>

        <div class="col">
            <label>CNPJ *</label>

            <input type="text" name="cnpj"
                class="form-control @error('cnpj') is-invalid @enderror"
                value="{{ old('cnpj', $dado->cnpj ?? '') }}"
                required>

            @error('cnpj')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Telefone *</label>

            <input type="text" name="telefone"
                class="form-control @error('telefone') is-invalid @enderror"
                value="{{ old('telefone', $dado->telefone ?? '') }}"
                required>

            @error('telefone')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>
    </div>

    <br>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ url('fornecedor') }}" class="btn btn-primary">Voltar</a>

</form>

@stop