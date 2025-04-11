<?php

namespace Tests\Feature;

use App\Models\Unidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UnidadeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_unidade()
    {
        $response = $this->postJson('/api/unidades', [
            'unidade' => 'Kg',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'unidade' => 'Kg',
        ]);
    }

    public function test_can_get_a_list_of_unidades()
    {
        Unidade::factory()->count(3)->create();

        $response = $this->getJson('/api/unidades');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_can_show_a_unidade()
    {
        $unidade = Unidade::factory()->create();

        $response = $this->getJson('/api/unidades/' . $unidade->id);

        $response->assertStatus(200);
        $response->assertJson([
            'unidade' => $unidade->unidade,
        ]);
    }

    public function test_can_update_a_unidade()
    {
        $unidade = Unidade::factory()->create();

        $response = $this->putJson('/api/unidades/' . $unidade->id, [
            'unidade' => 'Litro',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'unidade' => 'Litro',
        ]);
    }

    public function test_can_delete_a_unidade()
    {
        $unidade = Unidade::factory()->create();

        $response = $this->deleteJson('/api/unidades/' . $unidade->id);

        $response->assertStatus(204);
    }
}
