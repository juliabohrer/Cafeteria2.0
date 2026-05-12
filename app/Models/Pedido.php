<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'funcionario_id',
        'total'
    ];

    // funcionário que fez o pedido
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    // itens do pedido
    public function itens()
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }

    // entrega do pedido (1:1)
public function entrega()
{
    return $this->hasOne(Entrega::class, 'pedido_id', 'id');
}
}