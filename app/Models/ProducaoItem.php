<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducaoItem extends Model
{
    use HasFactory;
    protected $fillable = ['producao_id', 'item_id', 'quantidade_produzida'];

    public function producao()
    {
        return $this->belongsTo(Producao::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
