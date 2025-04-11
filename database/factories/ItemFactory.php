<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Categoria;
use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'categoria_id' => Categoria::factory(),
            'unidade_id' => Unidade::factory(),
            'preco_custo' => $this->faker->randomFloat(2, 1, 100),
            'estoque_atual' => $this->faker->randomFloat(2, 1, 100),
            'ativo' => $this->faker->boolean,
        ];
    }
}
