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

        $itens = Item::factory()->count(2)->create();
        $itensIds = $itens->pluck('id')->toArray();

        $response = $this->postJson('/api/composicoes', [
            'nome'  => 'Composição de Teste',
            'quantidade' => 2,
            'percentual_perda' => 0.05,
            'itens' => $itensIds,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade' => 2,
            'percentual_perda' => 0.05,
        ]);

        $this->assertDatabaseHas('composicoes', [
            'quantidade' => 2,
            'percentual_perda' => 0.05,
        ]);

        $this->assertDatabaseHas('composicao_item', [
            'composicao_id' => $response->json('id'),
            'item_id' => $itensIds[0],
        ]);
    }

    public function test_it_can_get_a_list_of_composicoes()
    {
        $composicoes = Composicao::factory()->count(3)->create();
        $itens = Item::factory()->count(2)->create();

        foreach ($composicoes as $composicao) {
            $composicao->itens()->attach($itens->pluck('id')->toArray());
        }

        $response = $this->getJson('/api/composicoes');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_composicao()
    {
        $composicao = Composicao::factory()->create();
        $itens = Item::factory()->count(2)->create();
        $composicao->itens()->attach($itens->pluck('id')->toArray());


        $response = $this->getJson('/api/composicoes/' . $composicao->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade' => $composicao->quantidade,
        ]);
    }

    public function test_it_can_update_a_composicao()
    {
        $composicao = Composicao::factory()->create();
        $itens = Item::factory()->count(2)->create();
        $composicao->itens()->attach($itens->pluck('id')->toArray());


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
        $itens = Item::factory()->count(2)->create();
        $composicao->itens()->attach($itens->pluck('id')->toArray());


        $response = $this->deleteJson('/api/composicoes/' . $composicao->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('composicoes',$composicao->toArray());
    }
}
