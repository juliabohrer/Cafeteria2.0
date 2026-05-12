<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Fornecedor;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'descricao',
        'imagem',
        'categoria_id',
        'fornecedor_id' // 🔥 novo
    ];

    // Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // 🔥 Fornecedor (1 produto pertence a 1 fornecedor)
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    // Itens do pedido
    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class);
    }
}