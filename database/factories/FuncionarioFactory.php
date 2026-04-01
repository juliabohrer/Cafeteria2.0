<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),

            'horario' => $this->faker->randomElement([
                '6h-12h',
                '12h-18h',
                '18h-00h'
            ]),

            'imagem' => 'sem_imagem.png',
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'endereco' => $this->faker->address()
        ];
    }
}