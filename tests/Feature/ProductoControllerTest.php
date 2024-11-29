<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    /** @test */
    public function test_puede_crear_un_producto()
    {
        $categoria = Categoria::factory()->create([
            'id' => 1,
        ]);
        $response = $this->post('/productos', [
            'name' => 'pc',
            'description' => 'una pc',
            'price' => 25000.01,
            'stock' => 5,
            'categoria_id' => $categoria->id
        ]);

        $response->assertRedirect('/productos');
        $this->assertDatabaseHas('productos', [
            'nombre' => 'pc',
            'descripcion' => 'una pc',
            'precio' => 25000.01,
            'stock' => 5,
            'categoria_id' => $categoria->id
        ]);
    }
    /** @test */
    public function puede_mostrar_detalles_de_un_producto()
    {
        $producto = Producto::factory()->create();
        $response = $this->get("/productos/{$producto->id}");
        $response->assertStatus(200);
        $response->assertSee($producto->nombre);
        $response->assertSee($producto->descripcion);
        $response->assertSee($producto->precio);
        $response->assertSee($producto->stock);
        $response->assertSee($producto->categoria->nombre);
    }
    /** @test */
    public function puede_actualizar_un_producto()
    {
        $categoria = Categoria::factory()->create([
            'id' => 1,
        ]);
        $producto = Producto::factory()->create([
            'nombre' => 'pc',
            'descripcion' => 'una pc',
            'precio' => 25000.01,
            'stock' => 5,
            'categoria_id' => $categoria->id
        ]);

        $response = $this->put("/productos/{$producto->id}", [
            'nombre' => 'Laptop',
            'descripcion' => 'Laptop con pantalla 4K',
            'precio' => 19000.99,
            'stock' => 7,
            'categoria_id' => $categoria->id
        ]);

        $response->assertRedirect('/productos');

        $this->assertDatabaseHas('productos', [
            'nombre' => 'Laptop',
            'descripcion' => 'Laptop con pantalla 4K',
            'precio' => 19000.99,
            'stock' => 7,
            'categoria_id' => $categoria->id
        ]);
        $this->assertDatabaseMissing('productos', [
            'nombre' => 'pc',
            'descripcion' => 'una pc',
            'precio' => 25000.01,
            'stock' => 5,
            'categoria_id' => $categoria->id
        ]);
    }

    /** @test */
    public function puede_eliminar_un_producto()
    {
        $producto = Producto::factory()->create();
        $response = $this->delete("/productos/{$producto->id}");
        $response->assertRedirect('/productos');
        $this->assertSoftDeleted('productos', [
            'id' => $producto->id,
        ]);
    }
}
