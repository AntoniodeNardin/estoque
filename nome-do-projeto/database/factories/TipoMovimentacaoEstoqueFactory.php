<?php

namespace Database\Factories;

use App\Models\TipoMovimentacaoEstoque;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoMovimentacaoEstoqueFactory extends Factory
{
    protected $model = TipoMovimentacaoEstoque::class;

    public function definition()
    {
        return [
            'descricao' => $this->faker->word,
            'tipo' => $this->faker->randomElement(['Entrada', 'Saída']),
        ];
    }
}
