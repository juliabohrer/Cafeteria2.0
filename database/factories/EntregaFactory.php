<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;

class EntregaFactory extends Factory
{
    public function definition(): array
    {
        // 🔎 pega um pedido que ainda não tem entrega
        $pedido = Pedido::doesntHave('entrega')
            ->inRandomOrder()
            ->first();

        return [
            'pedido_id' => $pedido?->id,

            'endereco' => $this->faker->streetAddress(),

            'status' => $this->faker->randomElement([
                'pendente',
                'enviado',
                'entregue'
            ]),
        ];
    }
}