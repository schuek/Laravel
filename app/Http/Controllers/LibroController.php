<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * CONSULTA: Muestra la lista
     */
    public function index()
    {
        $libros = Libro::all();
        // Pasamos los libros a la vista
        return view('libros.index', ['libros' => $libros]);
    }


     //ALTA (VISTA): Solo muestra el formulario

    public function create()
    {

        return view('libros.create');
    }

    /**
     * ALTA (LÓGICA): Recibe el POST, valida y guarda
     */
    public function store(Request $request)
    {
        // 1. Validación
        $validated = $request->validate([
            'titulo'      => 'required|string|max:255',
            'autor'       => 'required|string|max:255',
            'anho'        => 'required|integer',
            'genero'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:1255',
        ]);

        // 2. Crear objeto y asignar valores
        $libro = new Libro();

        $libro->titulo      = $request->input('titulo');
        $libro->autor       = $request->input('autor');
        $libro->anho        = $request->input('anho');
        $libro->genero      = $request->input('genero');
        $libro->descripcion = $request->input('descripcion');

        // 3. Guardar en Base de Datos
        $libro->save();

        // 4. Redirigir al índice con mensaje de éxito
        // Usamos ->with() para enviar el mensaje 'exito' a la sesión
        return redirect()->route('libro.index')->with('exito', 'Libro guardado correctamente');
    }

    /**
     * CONSULTAR: Muestra un solo libro
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', ['libro' => $libro]);
    }

    //editar
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);

        return view('libros.edit', ['libro'=> $libro]);
    }

    //actualizar
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validamos (igual que en store)
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'autor'       => 'required|string|max:255',
            'anho'        => 'required|integer',
            'genero'      => 'required|string',
            'descripcion' => 'required|string',
        ]);

        // 2. Buscamos el libro a actualizar
        $libro = Libro::findOrFail($id);

        // 3. Actualizamos los campos
        $libro->titulo      = $request->input('titulo');
        $libro->autor       = $request->input('autor');
        $libro->anho        = $request->input('anho');
        $libro->genero      = $request->input('genero');
        $libro->descripcion = $request->input('descripcion');

        // 4. Guardamos cambios
        $libro->save();

        // 5. Volvemos al listado
        return redirect()->route('libro.index')->with('exito', 'Libro actualizado correctamente');
    }

    /**
     * BORRAR: Elimina el libro
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);

        if ($libro) {
            $libro->delete();
        }

        return redirect()->route('libro.index')->with('exito', 'Libro eliminado correctamente');
    }

}
