@extends('main')
@section('titulo', 'Formulário Funcionário')
@section('content')

<h4>Formulário Funcionário</h4>

@php
    $action = !empty($dado->id)
        ? route('funcionario.update', $dado->id)
        : route('funcionario.store');

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
        <input type="hidden" name="id" value="{{ $dado->id ?? '' }}">

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
            <label>CPF *</label>

            <input type="text" name="cpf"
                class="form-control @error('cpf') is-invalid @enderror"
                value="{{ old('cpf', $dado->cpf ?? '') }}"
                required>

            @error('cpf')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Endereço *</label>

            <input type="text" name="endereco"
                class="form-control @error('endereco') is-invalid @enderror"
                value="{{ old('endereco', $dado->endereco ?? '') }}"
                required>

            @error('endereco')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>

        <div class="col">
            <label>Horário *</label>

            <input type="text" name="horario"
                class="form-control @error('horario') is-invalid @enderror"
                value="{{ old('horario', $dado->horario ?? '') }}"
                required>

            @error('horario')
                <small class="text-danger">Campo obrigatório</small>
            @enderror
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Imagem</label><br>

            <img src="{{ asset('storage/' . $nome_imagem) }}"
                 width="150"
                 height="150"
                 style="object-fit: cover; border-radius: 50%;">

            <input type="file" name="imagem"
                class="form-control mt-2 @error('imagem') is-invalid @enderror">

            @error('imagem')
                <small class="text-danger">Imagem inválida</small>
            @enderror
        </div>
    </div>

    <br>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ url('funcionario') }}" class="btn btn-primary">Voltar</a>

</form>

@stop