<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement([
                'Café Expresso',
                'Cappuccino',
                'Latte',
                'Mocha',
                'Chocolate Quente',
                'Café Gelado'
            ]),

            'preco' => $this->faker->randomFloat(2, 5, 50),
            'descricao' => $this->faker->sentence(),
            'imagem' => 'sem_imagem.png',
            'categoria_id' => Categoria::inRandomOrder()->value('id') ?? Categoria::factory()
        ];
    }
}