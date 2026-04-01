<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente',
        'produto_id',
        'funcionario_id',
        'quantidade',
        'total'
    ];

        public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}