@extends('main')

@section('titulo', 'Gráficos do Sistema')

@section('content')

<div class="container-fluid mt-4 px-5">

    <div class="text-center mb-5">

        <h1 style="
            color:#6F4E37;
            font-weight:bold;
        ">
            Dashboard da Cafeteria
        </h1>

        <p class="text-muted fs-5">
            Relatórios e gráficos do sistema
        </p>

    </div>

    <div class="row g-4">

        {{-- GRÁFICO PIZZA --}}
        <div class="col-lg-6">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4"
                     style="
                        background:#f8f1e7;
                        height:650px;
                     ">

                    <h3 class="text-center mb-4"
                        style="
                            color:#6F4E37;
                            font-weight:bold;
                        ">

                        Produtos Mais Vendidos

                    </h3>

                    <div class="d-flex justify-content-center align-items-center"
                         style="height:500px;">

                        <div style="
                            width:100%;
                            max-width:500px;
                        ">

                            {!! $chartProdutos->container() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- GRÁFICO BARRAS --}}
        <div class="col-lg-6">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4"
                     style="
                        background:#f5ebe0;
                        height:650px;
                     ">

                    <h3 class="text-center mb-4"
                        style="
                            color:#6F4E37;
                            font-weight:bold;
                        ">

                        Pedidos por Funcionário

                    </h3>

                    <div class="d-flex justify-content-center align-items-center"
                         style="height:500px;">

                        <div style="
                            width:100%;
                            max-width:600px;
                        ">

                            {!! $chartFuncionarios->container() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- BOTÃO --}}
    <div class="text-center mt-5">

        <a href="{{ route('pedido.index') }}"
           class="btn btn-dark px-5 py-2 rounded-pill shadow">

            Voltar

        </a>

    </div>

</div>

{{-- APEXCHARTS --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

{{-- SCRIPTS --}}
{{ $chartProdutos->script() }}

{{ $chartFuncionarios->script() }}

@stop