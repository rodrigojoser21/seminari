<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Categoria;

class CategoriaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    /** @test */

    public function test_puede_crear_una_categoria()
    {
        $response = $this->post('/categorias', [
            'nombre' => 'Ropa'
        ]);

        $response->assertRedirect('/categorias');
        $this->assertDatabaseHas('categorias', [
            'nombre' => 'Ropa'
        ]);
    }
    /** @test */
    public function puede_mostrar_detalles_de_una_categoria()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->get("/categorias/{$categoria->id}");
        $response->assertStatus(200);
        $response->assertSee($categoria->nombre);
    }

    /** @test */
    public function puede_actualizar_una_categoria()
    {

        $categoria = Categoria::factory()->create([
            'nombre' => 'Ropa',
        ]);

        $response = $this->put("/categorias/{$categoria->id}", [
            'nombre' => 'Accesorios',
        ]);

        $response->assertRedirect('/categorias');

        $this->assertDatabaseHas('categorias', [
            'id' => $categoria->id,
            'nombre' => 'Accesorios',
        ]);
        $this->assertDatabaseMissing('categorias', [
            'id' => $categoria->id,
            'nombre' => 'Ropa',
        ]);
    }
}
