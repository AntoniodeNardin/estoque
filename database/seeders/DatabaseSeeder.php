<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Unidade;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Categoria::factory()->count(10)->create();
        Item::factory()->count(20)->create();
        Unidade::factory()->count(20)->create();
    }
}
