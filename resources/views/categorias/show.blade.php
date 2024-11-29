<!DOCTYPE html>
<html>
<head>
    <title>Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Categoria</h1>
    <p><strong>ID:</strong> {{ $categoria->id }}</p>
    <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>    
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
</body>
</html>
