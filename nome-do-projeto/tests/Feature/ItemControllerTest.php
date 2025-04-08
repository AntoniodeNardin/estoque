<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Categoria;
use App\Models\Unidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_an_item()
    {
        $categoria = Categoria::factory()->create();
        $unidade = Unidade::factory()->create();

        $response = $this->postJson('/api/itens', [
            'nome' => 'Ingrediente X',
            'categoria_id' => $categoria->id,
            'unidade_id' => $unidade->id,
            'preco_custo' => 10.5,
            'estoque_atual' => 100,
            'ativo' => true,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'nome' => 'Ingrediente X',
            'preco_custo' => 10.5,
        ]);
    }

    public function test_it_can_get_a_list_of_itens()
    {
        Item::factory()->count(3)->create();

        $response = $this->getJson('/api/itens');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_an_item()
    {
        $item = Item::factory()->create();

        $response = $this->getJson('/api/itens/' . $item->id);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => $item->nome,
        ]);
    }

    public function test_it_can_update_an_item()
    {
        $item = Item::factory()->create();

        $response = $this->putJson('/api/itens/' . $item->id, [
            'nome' => 'Ingrediente Y',
            'preco_custo' => 15.0,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => 'Ingrediente Y',
            'preco_custo' => 15.0,
        ]);
    }

    public function test_it_can_delete_an_item()
    {
        $item = Item::factory()->create();

        $response = $this->deleteJson('/api/itens/' . $item->id);

        $response->assertStatus(204);
    }
}
