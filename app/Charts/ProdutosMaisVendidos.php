<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class ProdutosMaisVendidos
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart; 
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $dados = DB::table('item_pedidos')

            ->join(
                'produtos',
                'produtos.id',
                '=',
                'item_pedidos.produto_id'
            )

            ->select(
                'produtos.nome',
                DB::raw('SUM(item_pedidos.quantidade) as total')
            )

            ->groupBy('produtos.nome')
            ->orderByDesc('total')
            ->get();

 
        $produtos = [];
        $totais = [];

        foreach ($dados as $item) {

            $produtos[] = $item->nome;

            $totais[] = (int) $item->total;
        }

        
        return $this->chart->pieChart()

            ->setTitle('Produtos Mais Vendidos')

            ->setSubtitle('Cafeteria Gourmet')

            ->setColors([
                '#6F4E37', 
                '#A67B5B', 
                '#C4A484', 
                '#8B5E3C', 
                '#D2B48C',
                '#5C4033', 
            ])

            ->addData($totais)

            ->setLabels($produtos);
    }
}