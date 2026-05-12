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
            'funcionario_id' => Funcionario::inRandomOrder()->first()->id ?? 1,
            'total' => 0
        ];
    }
}