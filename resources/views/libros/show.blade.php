<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container pt-5">
        <div class="card">
            <div class="card-header">
                <h3>Detalles del Libro: {{ $libro->titulo }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p><strong>Año:</strong> {{ $libro->anho }}</p>
                <p><strong>Género:</strong> {{ $libro->genero }}</p>
                <p><strong>Descripción:</strong></p>
                <p>{{ $libro->descripcion }}</p>

                <hr>
                <a href="{{ route('libro.index') }}" class="btn btn-primary">Volver al listado</a>
            </div>
        </div>
    </div>
</body>
</html>
