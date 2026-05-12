@extends('main')

@section('titulo', 'Formulário Entrega')

@section('content')

<div class="container">

<h3>{{ isset($dado) ? 'Editar Entrega' : 'Nova Entrega' }}</h3>

<form method="POST"
      action="{{ isset($dado) ? route('entrega.update', $dado->id) : route('entrega.store') }}">

    @csrf

    @if(isset($dado))
        @method('PUT')
    @endif

    {{-- PEDIDO --}}
    <label>Pedido</label>
    <select name="pedido_id" class="form-control" required>

        <option value="">Selecione um pedido</option>

        @foreach($pedidos as $p)
            <option value="{{ $p->id }}"
                {{ isset($dado) && $dado->pedido_id == $p->id ? 'selected' : '' }}>
                Pedido #{{ $p->id }}
            </option>
        @endforeach

    </select>

    <br>

    {{-- ENDEREÇO --}}
    <label>Endereço</label>
    <input type="text" name="endereco"
           class="form-control"
           value="{{ $dado->endereco ?? '' }}"
           required>

    <br>

    {{-- STATUS --}}
    <label>Status</label>
    <select name="status" class="form-control">

        <option value="pendente" {{ isset($dado) && $dado->status == 'pendente' ? 'selected' : '' }}>
            Pendente
        </option>

        <option value="enviado" {{ isset($dado) && $dado->status == 'enviado' ? 'selected' : '' }}>
            Enviado
        </option>

        <option value="entregue" {{ isset($dado) && $dado->status == 'entregue' ? 'selected' : '' }}>
            Entregue
        </option>

    </select>

    <br><br>

    <button class="btn btn-success">Salvar</button>

</form>

</div>

@endsection