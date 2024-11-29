<!DOCTYPE html>
<html>

<head>
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Registrar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Producto*</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion*</label>
            <input type="text" name="description" class="form-control" id="description"
                value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio*</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}"
                step="any" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock*</label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}"
                required>
        </div>
        <div>
            <label for="categoria" class="form-label">Categoría*</label>

            <select id="categoria" name="categoria_id" class="form-select" required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
</body>

</html>
