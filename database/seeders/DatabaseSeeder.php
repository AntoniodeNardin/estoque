<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Composicao;
use App\Models\Item;
use App\Models\Lote;
use App\Models\Unidade;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Categoria::factory()->count(10)->create();
        Item::factory()->count(10)->create();
        Unidade::factory()->count(10)->create();
        Composicao::factory()->count(10)->create();
        Lote::factory()->count(10)->create();
        Usuario::factory()->count(10)->create();

        Usuario::create([
            'nome' => 'Admin',
            'email' => 'admin@gmail.com',
            'senha' => bcrypt('123456'),
            'tipo' => 'administrador',
        ]);
    }
}
