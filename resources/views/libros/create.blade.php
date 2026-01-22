<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Biblioteca</a>
        </div>
    </nav>

    <div class="container pt-4">
        <h2>Añadir Nuevo Libro</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libro.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="idtitulo" class="form-label">Título</label>
                <input value="{{ old('titulo') }}" type="text" name="titulo" class="form-control" id="idtitulo">
            </div>

            <div class="mb-3">
                <label for="idautor" class="form-label">Autor</label>
                <input value="{{ old('autor') }}" type="text" name="autor" class="form-control" id="idautor">
            </div>

            <div class="mb-3">
                <label for="idanho" class="form-label">Año publicación</label>
                <input type="number" name="anho" class="form-control" value="{{ old('anho') }}" id="idanho">
            </div>

            <div class="mb-3">
                <label for="idgenero" class="form-label">Género</label>
                <select class="form-select" id="idgenero" name="genero">
                    <option value="">Selecciona...</option>
                    <option value="Novela" {{ old('genero') == 'Novela' ? 'selected' : '' }}>Novela</option>
                    <option value="Suspense" {{ old('genero') == 'Suspense' ? 'selected' : '' }}>Suspense</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="iddescripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="iddescripcion" rows="3">{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-secondary" href="{{ route('libro.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>
