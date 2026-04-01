@extends('main')
@section('titulo', 'Formulário Funcionário')
@section('content')

<h4>Formulário Funcionário</h4>

@php
    if (!empty($dado->id)) {
        $action = route('funcionario.update', $dado->id);
    } else {
        $action = route('funcionario.store');
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
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control"
                value="{{ old('cpf', $dado->cpf ?? '') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Endereço</label>
            <input type="text" name="endereco" class="form-control"
                value="{{ old('endereco', $dado->endereco ?? '') }}">
        </div>

        <div class="col">
            <label>Horário</label>
            <input type="text" name="horario" class="form-control"
                value="{{ old('horario', $dado->horario ?? '') }}">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <label>Imagem</label><br>

            <img src="{{ asset('storage/' . $nome_imagem) }}"
                 width="150"
                 height="150"
                 style="object-fit: cover; border-radius: 50%;">

            <input type="file" name="imagem" class="form-control mt-2">
        </div>
    </div>

    <br>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ url('funcionario') }}" class="btn btn-primary">Voltar</a>

</form>

@stop