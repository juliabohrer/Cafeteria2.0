<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->string('cliente');

            // PRODUTO
            $table->foreignId('produto_id')
                ->nullable() // 👈 permite ficar null
                ->constrained()
                ->nullOnDelete(); // 👈 se deletar produto → vira null

            // FUNCIONÁRIO
            $table->foreignId('funcionario_id')
                ->nullable() // 👈 obrigatório!
                ->constrained()
                ->nullOnDelete(); // 👈 se deletar funcionário → vira null

            $table->integer('quantidade');
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};