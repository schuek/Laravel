
    <form action="/procesar-datos" method="POST">
        @csrf
        <label for="nombre">Nombre: </label>
        <input type="text" name="name" placeholder="Escribe tu nombre">
        <br> <br>
        <label for="edad">Edad: </label>
        <input type="edad" name="edad" placeholder="Escribe tu edad">
        <br><br>
        <button type="submit">ENVIAR DATOS</button>
    </form>
