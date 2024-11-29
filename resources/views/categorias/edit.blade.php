<!DOCTYPE html>
<html>

<head>
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Categoria*</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ $categoria->nombre }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Ir a la lista principal</a>
    </form>
</body>

</html>
