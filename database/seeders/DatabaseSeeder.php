<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriaSeeder::class,
            FornecedorSeeder::class,
            ProdutoSeeder::class,
            FuncionarioSeeder::class,
            PedidoSeeder::class,
            ItemPedidoSeeder::class,
            EntregaSeeder::class
        ]);
    }
}