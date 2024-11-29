<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Categoria;
use App\Http\Controllers\CategoriaController;
use Illuminate\Validation\ValidationException;
use illuminate\Http\Request;

class CategoriaControllerUnitTest extends TestCase
{
    public function test_validacion_falla_para_crear_categorias()
    {
        $controller = new CategoriaController();
        $request = Request::create('/categorias', 'POST', [
            'nombre' => '',
        ]);
        $this->expectException(ValidationException::class);
        $response = $controller->store($request);
        $this->assertFalse($response->isRedirect(route('categorias.index')));
    }
    public function test_validacion_correcta_para_crear_categorias()
    {
        $controller = new CategoriaController();
        $request = Request::create('/categorias', 'POST', [
            'nombre' => 'Electronicos',
        ]);
        $this->expectException(ValidationException::class);
        $response = $controller->store($request);
        //$this->assertSame('Electronicos')
    }
}
