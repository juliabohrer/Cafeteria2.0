<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;

class ItemPedidoSeeder extends Seeder
{
    public function run(): void
    {
        $pedidos = Pedido::all();
        $produtos = Produto::all();

        if ($pedidos->isEmpty() || $produtos->isEmpty()) {
            return;
        }

        foreach (range(1, 20) as $i) {
            $produto = $produtos->random();
            $quantidade = rand(1, 5);
            $valor = $produto->preco;

            ItemPedido::create([
                'pedido_id' => $pedidos->random()->id,
                'produto_id' => $produto->id,
                'quantidade' => $quantidade,
                'valor_unitario' => $valor,
                'subtotal' => $quantidade * $valor,
            ]);
        }
    }
}