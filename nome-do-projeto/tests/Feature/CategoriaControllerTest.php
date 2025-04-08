<?php

namespace Tests\Feature;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_test_it_can_create_a_categoria()
    {
        $response = $this->postJson('/api/categorias', [
            'nome' => 'Ingrediente',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'nome' => 'Ingrediente',
        ]);
    }

    public function test_test_it_can_get_a_list_of_categorias()
    {
        Categoria::factory()->count(3)->create();

        $response = $this->getJson('/api/categorias');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_test_it_can_show_a_categoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->getJson('/api/categorias/' . $categoria->id);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => $categoria->nome,
        ]);
    }

    public function test_test_it_can_update_a_categoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->putJson('/api/categorias/' . $categoria->id, [
            'nome' => 'Fórmula Base',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => 'Fórmula Base',
        ]);
    }

    public function test_test_it_can_delete_a_categoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->deleteJson('/api/categorias/' . $categoria->id);

        $response->assertStatus(204);
    }
}
