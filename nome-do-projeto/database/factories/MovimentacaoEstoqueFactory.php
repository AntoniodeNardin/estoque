<?php

namespace Database\Factories;

use App\Models\MovimentacaoEstoque;
use App\Models\Item;
use App\Models\TipoMovimentacaoEstoque;
use App\Models\Lote;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentacaoEstoqueFactory extends Factory
{
    protected $model = MovimentacaoEstoque::class;

    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'tipo_movimentacao_id' => TipoMovimentacaoEstoque::factory(),
            'lote_id' => Lote::factory(),
            'usuario_id' => Usuario::factory(),
            'quantidade' => $this->faker->randomFloat(2, 1, 100),
            'data_movimentacao' => $this->faker->dateTime,
            'observacao' => $this->faker->sentence,
        ];
    }
}
