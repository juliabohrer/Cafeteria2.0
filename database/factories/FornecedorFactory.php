<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company(),
            'cnpj' => $this->faker->numerify('##############'),
            'telefone' => $this->faker->phoneNumber()
        ];
    }
}