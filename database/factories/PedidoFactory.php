<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente' => $this->faker->name(),
            'produto_id' => $this->faker->numberBetween(1, 10),
            'funcionario_id' => $this->faker->numberBetween(1, 10),
            'quantidade' => $this->faker->numberBetween(1, 5),
            'total' => $this->faker->randomFloat(2, 10, 100)
        ];
    }
}