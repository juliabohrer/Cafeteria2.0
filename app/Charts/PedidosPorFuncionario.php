<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PedidosPorFuncionario
{
    protected $chart;

    public function __construct(LarapexChart $chart) 
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart 
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
                DB::raw('count(*) as total') 
            )
            ->groupBy('funcionarios.nome')
            ->get();

        $nomes = [];
        $totais = [];

        foreach ($dados as $item) {

            $nomes[] = $item->nome;
            $totais[] = $item->total;
        }

        
        return $this->chart->barChart()

            ->setTitle('Pedidos por Funcionário')

            ->setSubtitle('Cafeteria Gourmet')

            ->addData($totais)

            ->setXAxis($nomes)

            ->setColors([
                '#6F4E37', 
            ])

            ->setGrid()

            ->setFontColor('#4B2E2E');
    }
}