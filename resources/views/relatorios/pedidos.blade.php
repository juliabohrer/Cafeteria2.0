<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Relatório Pedidos</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            color:#4E342E;
            margin:30px;
        }

        .topo{
            text-align:center;
            margin-bottom:30px;
        }

        .topo h1{
            margin:0;
            color:#6F4E37;
            font-size:28px;
        }

        .topo p{
            color:#8D6E63;
            margin-top:5px;
        }

        .linha{
            width:100%;
            height:4px;
            background:#D7CCC8;
            margin-top:15px;
            border-radius:10px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th{
            background:#6F4E37;
            color:white;
            padding:12px;
            text-align:left;
            font-size:14px;
        }

        td{
            padding:10px;
            border-bottom:1px solid #D7CCC8;
            font-size:13px;
        }

        tr:nth-child(even){
            background:#EFEBE9;
        }

        .valor{
            font-weight:bold;
            color:#5D4037;
        }

        .status{
            font-weight:bold;
        }

        .rodape{
            margin-top:30px;
            text-align:center;
            font-size:12px;
            color:#8D6E63;
        }

    </style>

</head>

<body>

    {{-- TOPO --}}
    <div class="topo">

        <h1>
            Relatório de Pedidos
        </h1>

        <p>
            Cafeteria Gourmet
        </p>

        <div class="linha"></div>

    </div>

    {{-- TABELA --}}
    <table>

        <thead>

            <tr>

                <th>ID</th>

                <th>Cliente</th>

                <th>Funcionário</th>

                <th>Total</th>

                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($dados as $pedido)

            <tr>

                <td>
                    {{ $pedido->id }}
                </td>

                <td>
                    {{ $pedido->cliente }}
                </td>

                <td>
                    {{ $pedido->funcionario->nome ?? '---' }}
                </td>

                <td class="valor">

                    R$
                    {{ number_format($pedido->total, 2, ',', '.') }}

                </td>

                <td class="status">

                    {{ $pedido->entrega->status ?? '---' }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="rodape">

        Sistema Cafeteria Gourmet

    </div>

</body>

</html>