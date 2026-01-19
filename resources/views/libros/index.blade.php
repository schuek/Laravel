<h1>Libros Disponibles</h1>

    <a href="{{ route('libros.create') }}">Añadir nuevo libro</a>
    <hr>

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Género</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>{{ $libro->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
