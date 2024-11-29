<!DOCTYPE html>
<html>

<head>
    <title>Agregar Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Agregar una nueva categoria</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la categoria</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value= "{{ old('nombre') }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
</body>

</html>
