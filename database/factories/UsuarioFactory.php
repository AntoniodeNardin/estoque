<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'senha' => bcrypt('password'),
            'tipo' => $this->faker->randomElement(['administrador', 'operador']),
            'ativo' => $this->faker->boolean,
        ];
    }
}
