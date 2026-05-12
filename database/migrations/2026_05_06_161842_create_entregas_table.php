<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();

            // 1:1 com pedido
            $table->foreignId('pedido_id')
                ->unique() // garante 1:1
                ->constrained()
                ->cascadeOnDelete();

            $table->string('endereco');
            $table->string('status')->default('pendente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};