<?php

namespace Tests\Feature;

use App\Models\MovimentacaoEstoque;
use App\Models\Usuario;
use App\Models\Item;
use App\Models\TipoMovimentacaoEstoque;
use App\Models\Lote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovimentacaoEstoqueControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_movimentacao()
    {
        $usuario = Usuario::factory()->create();
        $item = Item::factory()->create();
        $tipoMovimentacao = TipoMovimentacaoEstoque::factory()->create();
        $lote = Lote::factory()->create();

        $response = $this->postJson('/api/movimentacoes-estoque', [
            'item_id' => $item->id,
            'tipo_movimentacao_id' => $tipoMovimentacao->id,
            'lote_id' => $lote->id,
            'usuario_id' => $usuario->id,
            'quantidade' => 10,
            'data_movimentacao' => now(),
            'observacao' => 'Movimentação de teste',
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'quantidade' => 10,
            'observacao' => 'Movimentação de teste',
        ]);
    }

    public function test_it_can_get_a_list_of_movimentacoes()
    {
        MovimentacaoEstoque::factory()->count(3)->create();

        $response = $this->getJson('/api/movimentacoes-estoque');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_movimentacao()
    {
        $movimentacao = MovimentacaoEstoque::factory()->create();

        $response = $this->getJson('/api/movimentacoes-estoque/' . $movimentacao->id);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade' => $movimentacao->quantidade,
        ]);
    }

    public function test_it_can_update_a_movimentacao()
    {
        $movimentacao = MovimentacaoEstoque::factory()->create();

        $response = $this->putJson('/api/movimentacoes-estoque/' . $movimentacao->id, [
            'quantidade' => 15,

        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'quantidade' => 15,
        ]);
    }

    public function test_it_can_delete_a_movimentacao()
    {
        $movimentacao = MovimentacaoEstoque::factory()->create();

        $response = $this->deleteJson('/api/movimentacoes-estoque/' . $movimentacao->id);

        $response->assertStatus(204);
    }
}
