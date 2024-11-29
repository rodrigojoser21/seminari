<!DOCTYPE html>
<html>

<head>
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto*</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $producto->nombre }}"
                required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion*</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion"
                value="{{ $producto->descripcion }}">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio*</label>
            <input type="number" name="precio" class="form-control" id="precio" value="{{ $producto->precio }}"
                step="any" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock*</label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{ $producto->stock }}"
                required>
        </div>
        <div>
            <label for="categoria_id" class="form-label">Categoría*</label>

            <select id="categoria_id" name="categoria_id" class="form-select" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Ir a la lista principal</a>
    </form>
</body>

</html>
