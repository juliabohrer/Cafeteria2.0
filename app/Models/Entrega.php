<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entregas';
    protected $fillable = [
        'pedido_id',
        'endereco',
        'status'
    ];

    // relacionamento correto
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}