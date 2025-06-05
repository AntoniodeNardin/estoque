<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    use HasFactory;

    protected $table = 'producoes';

    protected $with = [
        'usuario',
        'resultados',
        'itens'
    ];

    protected $fillable = [
        'data_producao',
        'usuario_id',
        'observacao'
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function resultados()
    {
        return $this->hasMany(ProducaoResultado::class, 'producao_id');
    }

    public function itens()
    {
        return $this->hasMany(ProducaoItem::class);
    }
}
