<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entrega;
use App\Models\Pedido;

class EntregaSeeder extends Seeder
{
    public function run(): void
    {
        $pedidos = Pedido::doesntHave('entrega')->get();

        foreach ($pedidos as $pedido) {

            Entrega::create([
                'pedido_id' => $pedido->id,

                'endereco' => fake()->streetAddress(),

                'status' => fake()->randomElement([
                    'pendente',
                    'enviado',
                    'entregue'
                ]),
            ]);
        }
    }
}