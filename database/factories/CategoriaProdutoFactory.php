<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaProdutoFactory extends Factory
{
    protected $model = \App\Models\Categoria::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement([
                'Cafés Gelados',
                'Cafés Quentes',
                'Bebidas Geladas',
                'Bebidas Quentes',
            ]),
            'nivel' => $this->faker->numberBetween(1, 4)
        ];
    }
}