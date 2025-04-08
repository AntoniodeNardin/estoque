<?php

namespace Tests\Feature;

use App\Models\ProducaoResultado;
use App\Models\Producao;
use App\Models\Lote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProducaoResultadoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_producao_resultado()
    {
        $producao = Producao::factory()->create();
        $lote = Lote::factory()->create();

        $response = $this->postJson('/api/producoes-resultados', [
            'producao_id' => $producao->id,
            'lote_id' => $lote->id,
            'quantidade_gerada' => 90,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade_gerada' => 90,
        ]);
    }

    public function test_it_can_get_a_list_of_producao_resultados()
    {
        ProducaoResultado::factory()->count(3)->create();

        $response = $this->getJson('/api/producoes-resultados');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_producao_resultado()
    {
        $producaoResultado = ProducaoResultado::factory()->create();

        $response = $this->getJson('/api/producoes-resultados/' . $producaoResultado->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_gerada' => $producaoResultado->quantidade_gerada,
        ]);
    }

    public function test_it_can_update_a_producao_resultado()
    {
        $producaoResultado = ProducaoResultado::factory()->create();

        $response = $this->putJson('/api/producoes-resultados/' . $producaoResultado->id, [
            'quantidade_gerada' => 80,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade_gerada' => 80,
        ]);
    }

    public function test_it_can_delete_a_producao_resultado()
    {
        $producaoResultado = ProducaoResultado::factory()->create();

        $response = $this->deleteJson('/api/producoes-resultados/' . $producaoResultado->id);

        $response->assertStatus(204);
    }
}
