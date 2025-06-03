<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoEstoque extends Model
{
    use HasFactory;

    protected $table = 'movimentacoes_estoque';

    protected $fillable = [
        'item_id',
        'tipo_movimentacao_id',
        'lote_id',
        'producao_id',
        'usuario_id',
        'quantidade',
        'data_movimentacao',
        'observacao'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function tipoMovimentacao()
    {
        return $this->belongsTo(TipoMovimentacaoEstoque::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }

    public function producao()
    {
        return $this->belongsTo(Producao::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
