<?php

namespace Database\Factories;

use App\Models\Lote;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoteFactory extends Factory
{
    protected $model = Lote::class;

    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'codigo_lote' => $this->faker->unique()->word,
            'data_validade' => $this->faker->date(),
            'quantidade_disponivel' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
