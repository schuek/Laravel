<h1>Dar de alta un nuevo libro</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <label>Título:</label><br>
        <input type="text" name="titulo" value="{{ old('titulo') }}"><br><br>

        <label>Autor:</label><br>
        <input type="text" name="autor" value="{{ old('autor') }}"><br><br>

        <label>Año de publicación:</label><br>
        <input type="number" name="anio" value="{{ old('anio') }}"><br><br>

        <label>Género:</label><br>
        <select name="genero">
            <option value="">Selecciona una opción</option>
            <option value="Novela" {{ old('genero') == 'Novela' ? 'selected' : '' }}>Novela</option>
            <option value="Ciencia Ficción" {{ old('genero') == 'Ciencia Ficción' ? 'selected' : '' }}>Ciencia Ficción</option>
            <option value="Historia" {{ old('genero') == 'Historia' ? 'selected' : '' }}>Historia</option>
            <option value="Técnico" {{ old('genero') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
        </select><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" rows="4">{{ old('descripcion') }}</textarea><br><br>

        <button type="submit">Guardar Libro</button>
    </form>

    <br>
    <a href="{{ route('libros.index') }}">Volver al listado</a>
