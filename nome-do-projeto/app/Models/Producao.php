<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;

    protected $table = 'producoes';

    protected $fillable = [
        'item_id', 'quantidade_produzida', 'data_producao', 'usuario_id', 'observacao'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function resultados()
    {
        return $this->hasMany(ProducaoResultado::class, 'producao_id');
    }
}
