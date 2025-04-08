<?php

namespace Database\Factories;

use App\Models\Composicao;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComposicaoFactory extends Factory
{
    protected $model = Composicao::class;

    public function definition()
    {
        return [
            'item_pai_id' => Item::factory(),
            'item_componente_id' => Item::factory(),
            'quantidade' => $this->faker->randomFloat(2, 1, 10),
            'percentual_perda' => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}
