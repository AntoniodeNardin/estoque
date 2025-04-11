<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'itens';

    protected $fillable = [
        'nome', 'categoria_id', 'unidade_id', 'preco_custo',
        'estoque_atual', 'ativo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
