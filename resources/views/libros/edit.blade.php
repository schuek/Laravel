<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container pt-4">
        <h2>Editar Libro: {{ $libro->titulo }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libro.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Autor</label>
                <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Año</label>
                <input type="number" name="anho" class="form-control" value="{{ old('anho', $libro->anho) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Género</label>
                <select class="form-select" name="genero">
                    <option value="Novela" {{ (old('genero', $libro->genero) == 'Novela') ? 'selected' : '' }}>Novela</option>
                    <option value="Suspense" {{ (old('genero', $libro->genero) == 'Suspense') ? 'selected' : '' }}>Suspense</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion', $libro->descripcion) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar Libro</button>
            <a class="btn btn-secondary" href="{{ route('libro.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>
