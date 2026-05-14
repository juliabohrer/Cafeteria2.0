<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Funcionario;

class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente' => $this->faker->name(),

            'funcionario_id' =>
                Funcionario::inRandomOrder()->first()->id ?? 1,

            'quantidade' => rand(1, 10),

            'total' => 0
        ];
    }
}