<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'codigo_lote', 'data_validade', 'quantidade_disponivel'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
