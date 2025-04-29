<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_usuario()
    {
        $response = $this->postJson('/api/usuarios', [
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
            'senha' => bcrypt('senha123'),
            'tipo' => 'administrador',
            'ativo' => true,
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
        ]);
    }

    public function test_it_can_get_a_list_of_usuarios()
    {
        Usuario::factory()->count(3)->create();

        $response = $this->getJson('/api/usuarios');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_it_can_show_a_usuario()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->getJson('/api/usuarios/' . $usuario->id);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => $usuario->nome,
        ]);
    }

    public function test_it_can_update_a_usuario()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->putJson('/api/usuarios/' . $usuario->id, [
            'nome' => 'Carlos Oliveira',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'nome' => 'Carlos Oliveira',
        ]);
    }

    public function test_it_can_delete_a_usuario()
    {
        $usuario = Usuario::factory()->create();

        $response = $this->deleteJson('/api/usuarios/' . $usuario->id);

        $response->assertStatus(204);
    }
}
