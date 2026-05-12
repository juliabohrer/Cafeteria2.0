<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PedidosPorFuncionario
{
    protected $chart;

    public function __construct(LarapexChart $chart) //recebe
    {
        $this->chart = $chart;//guarda 
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart //monta o grafico de barra
    {

        $dados = DB::table('pedidos')
            ->join(
                'funcionarios',
                'funcionarios.id',
                '=',
                'pedidos.funcionario_id'
            )
            ->select(
                'funcionarios.nome',
                DB::raw('count(*) as total') //conta os registros
            )
            ->groupBy('funcionarios.nome')
            ->get();

        // Arrays do gráfico
        $nomes = [];
        $totais = [];

        foreach ($dados as $item) {

            $nomes[] = $item->nome;
            $totais[] = $item->total;
        }

        // Gráfico
        return $this->chart->barChart()

            ->setTitle('Pedidos por Funcionário')

            ->setSubtitle('Cafeteria Gourmet')

            ->addData($totais)

            ->setXAxis($nomes)

            ->setColors([
                '#6F4E37', // café
            ])

            ->setGrid()

            ->setFontColor('#4B2E2E')

            ->setToolbar(true);
    }
}