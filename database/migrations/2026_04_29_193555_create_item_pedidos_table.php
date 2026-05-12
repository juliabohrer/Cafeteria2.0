<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pedido_id')
                ->constrained()
                ->cascadeOnDelete(); // se o pedido for deletado, os itens somem junto

            $table->foreignId('produto_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete(); // se o produto for deletado, fica NULL (histórico)

            $table->decimal('quantidade', 8, 2); // decimal para aceitar ex: 0.5 kg
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_pedidos');
    }
};