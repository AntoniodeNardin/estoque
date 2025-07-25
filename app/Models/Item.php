<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itens';

    protected $fillable = [
        'nome',
        'categoria_id',
        'unidade_id',
        'preco_custo',
        'estoque_atual',
        'is_composicao',
        'ativo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function composicoes()
    {
        return $this->belongsToMany(Composicao::class, 'composicao_item');
    }
}
