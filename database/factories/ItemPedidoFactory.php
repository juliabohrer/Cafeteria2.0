<?php

namespace Database\Factories;

use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPedidoFactory extends Factory
{
    protected $model = ItemPedido::class;

    public function definition(): array
    {
        $quantidade = $this->faker->numberBetween(1, 10);
        $valor = $this->faker->randomFloat(2, 5, 100);

        return [
            'pedido_id' => Pedido::factory(),
            'produto_id' => Produto::factory(),
            'quantidade' => $quantidade,
            'valor_unitario' => $valor,
            'subtotal' => $quantidade * $valor,
        ];
    }
}