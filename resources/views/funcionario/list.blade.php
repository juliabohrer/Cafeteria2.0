@extends('main')
@section('titulo', 'Listagem de Funcionários')
@section('content')

<h4 class="mb-4 fw-bold">
    Listagem de Funcionários
</h4>

<!-- ===================================================== -->
<!-- BUSCA -->
<!-- ===================================================== -->

<form action="{{ route('funcionario.search') }}"
      method="POST">

    @csrf

    <div class="row mb-4">

        {{-- TIPO --}}
        <div class="col-md-3">

            <select name="tipo"
                    class="form-select shadow-sm">

                <option value="nome">
                    Nome
                </option>

                <option value="cpf">
                    CPF
                </option>

            </select>

        </div>

        {{-- VALOR --}}
        <div class="col-md-6">

            <input type="text"
                   name="valor"
                   class="form-control shadow-sm"
                   placeholder="Buscar funcionário...">

        </div>

        {{-- BOTÃO --}}
        <div class="col-md-3 d-grid">

            <button class="btn btn-primary">

                Buscar

            </button>

        </div>

    </div>

</form>

<!-- ===================================================== -->
<!-- BOTÕES -->
<!-- ===================================================== -->

<div class="d-flex gap-2 mb-4 flex-wrap">

    {{-- NOVO --}}
    <a href="{{ url('funcionario/create') }}"
       class="btn btn-success shadow-sm">

        Novo Funcionário

    </a>

</div>

<!-- ===================================================== -->
<!-- TABELA -->
<!-- ===================================================== -->

<div class="table-responsive">

    <table class="table table-hover table-bordered align-middle shadow-sm">

        <thead class="table-dark">

            <tr>

                <th width="70">
                    #
                </th>

                <th width="130">
                    Imagem
                </th>

                <th width="220">
                    Nome
                </th>

                <th width="170">
                    CPF
                </th>

                <th>
                    Endereço
                </th>

                <th width="150">
                    Horário
                </th>

                <th width="220">
                    Ações
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach ($dados as $item)

            @php

                $nome_imagem =
                    !empty($item->imagem)
                        ? $item->imagem
                        : 'sem_imagem.png';

            @endphp

            <tr>

                {{-- ID --}}
                <td class="fw-bold">

                    {{ $item->id }}

                </td>

                {{-- IMAGEM --}}
                <td>

                    <img src="{{ asset('storage/' . $nome_imagem) }}"
                         width="100"
                         height="100"
                         style="
                            object-fit: cover;
                            border-radius: 50%;
                            border: 3px solid #dee2e6;
                         ">

                </td>

                {{-- NOME --}}
                <td>

                    <strong class="fs-6">

                        {{ $item->nome }}

                    </strong>

                </td>

                {{-- CPF --}}
                <td>

                    <span class="badge bg-primary fs-6">

                        {{ $item->cpf }}

                    </span>

                </td>

                {{-- ENDEREÇO --}}
                <td>

                    {{ $item->endereco }}

                </td>

                {{-- HORÁRIO --}}
                <td>

                    <span class="badge bg-warning text-dark fs-6">

                        {{ $item->horario }}

                    </span>

                </td>

                {{-- AÇÕES --}}
                <td>

                    <div class="d-flex gap-2">

                        {{-- EDITAR --}}
                        <a href="{{ route('funcionario.edit', $item->id) }}"
                           class="btn btn-warning btn-sm w-100">

                            Editar

                        </a>

                        {{-- EXCLUIR --}}
                        <form action="{{ route('funcionario.destroy', $item->id) }}"
                              method="POST"
                              class="w-100">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100"
                                    onclick="return confirm('Deseja remover?')">

                                Excluir

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@stop