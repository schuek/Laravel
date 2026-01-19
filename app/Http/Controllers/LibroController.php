<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    //mostrar lista
    public function index()
    {
        $libros = Libro::all();//resgistros
        return view('libros.index', compact('libros'));
    }

    //formulario alta
    public function create()
    {
        return view('libros.crear');
    }

    //almacenar datos
    public function store(Request $request)
    {
        $request->validate([
            'titulo'        =>'required|string|max:255',
            'autor'         => 'required|string|max:255',
            'anho'          => 'required|integer|min:1000|max:' . date('Y'),
            'genero'        => 'required|string',
            'descripcion'   => 'required|string',
        ]);

        //guardar
        Libro::create($request->all());
        return redirect()->route('libros.index');
    }

}
