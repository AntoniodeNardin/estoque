<?php

namespace Database\Factories;

use App\Models\ProducaoResultado;
use App\Models\Producao;
use App\Models\Lote;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProducaoResultadoFactory extends Factory
{
    protected $model = ProducaoResultado::class;

    public function definition()
    {
        return [
            'producao_id' => Producao::factory(),
            'lote_id' => Lote::factory(),
            'quantidade_gerada' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
