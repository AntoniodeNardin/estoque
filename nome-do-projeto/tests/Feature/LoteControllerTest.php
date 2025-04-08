<?php

namespace Tests\Feature;

use App\Models\Lote;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_lote()
    {
        $item = Item::factory()->create();

        $response = $this->postJson('/api/lotes', [
            'item_id' => $item->id,
            'quantidade' => 100,
            'data_validade' => now()->addMonth(),
            'codigo_lote' => 'ABC123',
            'quantidade_disponivel' => 100,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade_disponivel' => 100,
        ]);
    }

    public function test_it_can_get_a_list_of_lotes()
    {
        Lote::factory()->count(3)->create();

        $response = $this->getJson('/api/lotes');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_lote()
    {
        $lote = Lote::factory()->create();

        $response = $this->getJson('/api/lotes/' . $lote->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_disponivel' => $lote->quantidade_disponivel,
        ]);
    }

    public function test_it_can_update_a_lote()
    {
        $lote = Lote::factory()->create();

        $response = $this->putJson('/api/lotes/' . $lote->id, [
            'quantidade_disponivel' => 200,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_disponivel' => 200,
        ]);
    }

    public function test_it_can_delete_a_lote()
    {
        $lote = Lote::factory()->create();

        $response = $this->deleteJson('/api/lotes/' . $lote->id);

        $response->assertStatus(204);
    }
}
