<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composicao extends Model
{
    use HasFactory;

    protected $table = 'composicoes';

    protected $fillable = [
        'item_pai_id', 'item_componente_id', 'quantidade', 'percentual_perda'
    ];

    public function itemPai()
    {
        return $this->belongsTo(Item::class, 'item_pai_id');
    }

    public function itemComponente()
    {
        return $this->belongsTo(Item::class, 'item_componente_id');
    }
}
