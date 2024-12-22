<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pode_criar_cliente()
    {
        $response = $this->post('/clientes', [
            'nome' => 'Teste Cliente',
            'email' => 'teste@email.com',
            'telefone' => '123456789',
            'foto' => null
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('clientes', ['nome' => 'Teste Cliente']);
    }

    /** @test */
    public function pode_visualizar_lista_de_clientes()
    {
        Cliente::factory()->create();
        $response = $this->get('/clientes');

        $response->assertStatus(200);
        $response->assertSee('Clientes');
    }

    /** @test */
    public function pode_excluir_cliente()
    {
        $cliente = Cliente::factory()->create();
        $response = $this->delete("/clientes/{$cliente->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }
}