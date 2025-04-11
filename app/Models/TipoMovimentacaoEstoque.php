<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimentacaoEstoque extends Model
{
    use HasFactory;

    protected $table = 'tipos_movimentacao_estoque';

    protected $fillable = [
        'descricao', 'tipo'
    ];
}
