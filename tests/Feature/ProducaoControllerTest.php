<?php

namespace Tests\Feature;

use App\Models\Producao;
use App\Models\Usuario;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProducaoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_producao()
    {
        $usuario = Usuario::factory()->create();
        $item = Item::factory()->create();

        $response = $this->postJson('/api/producoes', [
            'item_id' => $item->id,
            'quantidade_produzida' => 100,
            'data_producao' => now(),
            'usuario_id' => $usuario->id,
            'observacao' => 'Produção de teste',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade_produzida' => 100,
            'observacao' => 'Produção de teste',
        ]);
    }

    public function test_it_can_get_a_list_of_producoes()
    {
        Producao::factory()->count(3)->create();

        $response = $this->getJson('/api/producoes');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_producao()
    {
        $producao = Producao::factory()->create();

        $response = $this->getJson('/api/producoes/' . $producao->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_produzida' => $producao->quantidade_produzida,
        ]);
    }

    public function test_it_can_update_a_producao()
    {
        $producao = Producao::factory()->create();

        $response = $this->putJson('/api/producoes/' . $producao->id, [
            'quantidade_produzida' => 150,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_produzida' => 150,
        ]);
    }

    public function test_it_can_delete_a_producao()
    {
        $producao = Producao::factory()->create();

        $response = $this->deleteJson('/api/producoes/' . $producao->id);

        $response->assertStatus(204);
    }
}
