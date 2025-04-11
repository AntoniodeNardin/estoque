<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducaoResultado extends Model
{
    use HasFactory;

    protected $table = 'producoes_resultados';

    protected $fillable = [
        'producao_id', 'lote_id', 'quantidade_gerada'
    ];

    public function producao()
    {
        return $this->belongsTo(Producao::class);
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
