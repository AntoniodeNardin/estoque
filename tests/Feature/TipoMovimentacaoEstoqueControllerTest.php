<?php

namespace Tests\Feature;

use App\Models\TipoMovimentacaoEstoque;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TipoMovimentacaoEstoqueControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_tipo_movimentacao_estoque()
    {
        $response = $this->postJson('/api/tipos-movimentacao-estoque', [
            'descricao' => 'Entrada',
            'tipo' => 'Entrada',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'descricao' => 'Entrada',
            'tipo' => 'Entrada',
        ]);
    }

    public function test_it_can_get_a_list_of_tipo_movimentacao_estoque()
    {
        TipoMovimentacaoEstoque::factory()->count(3)->create();

        $response = $this->getJson('/api/tipos-movimentacao-estoque');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_tipo_movimentacao_estoque()
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::factory()->create();

        $response = $this->getJson('/api/tipos-movimentacao-estoque/' . $tipoMovimentacao->id);

        $response->assertStatus(200);
        $response->assertJson([
            'descricao' => $tipoMovimentacao->descricao,
        ]);
    }

    public function test_it_can_update_a_tipo_movimentacao_estoque()
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::factory()->create();

        $response = $this->putJson('/api/tipos-movimentacao-estoque/' . $tipoMovimentacao->id, [
            'descricao' => 'Saída',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'descricao' => 'Saída',
        ]);
    }

    public function test_it_can_delete_a_tipo_movimentacao_estoque()
    {
        $tipoMovimentacao = TipoMovimentacaoEstoque::factory()->create();

        $response = $this->deleteJson('/api/tipos-movimentacao-estoque/' . $tipoMovimentacao->id);

        $response->assertStatus(204);
    }
}
