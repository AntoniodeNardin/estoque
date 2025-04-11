<?php

namespace Tests\Feature;

use App\Models\Composicao;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComposicaoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_composicao()
    {
        $itemPai = Item::factory()->create();
        $itemComponente = Item::factory()->create();

        $response = $this->postJson('/api/composicoes', [
            'item_pai_id' => $itemPai->id,
            'item_componente_id' => $itemComponente->id,
            'quantidade' => 2,
            'percentual_perda' => 0.05,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade' => 2,
            'percentual_perda' => 0.05,
        ]);
    }

    public function test_it_can_get_a_list_of_composicoes()
    {
        Composicao::factory()->count(3)->create();

        $response = $this->getJson('/api/composicoes');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_composicao()
    {
        $composicao = Composicao::factory()->create();

        $response = $this->getJson('/api/composicoes/' . $composicao->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade' => $composicao->quantidade,
        ]);
    }

    public function test_it_can_update_a_composicao()
    {
        $composicao = Composicao::factory()->create();

        $response = $this->putJson('/api/composicoes/' . $composicao->id, [
            'quantidade' => 3,
            'percentual_perda' => 0.10,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade' => 3,
            'percentual_perda' => 0.10,
        ]);
    }

    public function test_it_can_delete_a_composicao()
    {
        $composicao = Composicao::factory()->create();

        $response = $this->deleteJson('/api/composicoes/' . $composicao->id);

        $response->assertStatus(204);
    }
}
