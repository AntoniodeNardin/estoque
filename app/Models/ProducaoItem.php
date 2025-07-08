<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducaoItem extends Model
{
    use HasFactory;

    protected $table = 'producao_itens';

    protected $fillable = ['producao_id', 'item_id', 'quantidade'];

    public function producao()
    {
        return $this->belongsTo(Producao::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
