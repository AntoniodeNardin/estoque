<?php

namespace Database\Factories;

use App\Models\Composicao;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComposicaoFactory extends Factory
{
    protected $model = Composicao::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'quantidade' => $this->faker->randomFloat(2, 1, 10),
            'percentual_perda' => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}
