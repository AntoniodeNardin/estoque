<?php

namespace Database\Factories;

use App\Models\Producao;
use App\Models\Item;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProducaoFactory extends Factory
{
    protected $model = Producao::class;

    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'quantidade_produzida' => $this->faker->randomFloat(2, 1, 100),
            'data_producao' => $this->faker->dateTime,
            'usuario_id' => Usuario::factory(),
            'observacao' => $this->faker->sentence,
        ];
    }
}
