<?php //Versión propia

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\DatosController;

//gestion de libros
use App\Http\Controllers\LibrosController;
//1. Ruta básica
Route::get('/', function () {
    return view('welcome');
});

//2. Ruta con parámetros
Route::get('/usuario/{id}', function ($id) {
    return 'El ID del usuario es: ' . $id;
});

//3. Ruta con nombres
Route::get('/contactos', function () {
    $url = route('contacto');
    return 'Página de contacto: ' . $url;
})->name('contacto');

//4. Agrupación de rutas
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/usuarios', function () {
        return 'Gestión de usuarios';
    });

    Route::get('/admin/configuracion', function () {
        return 'Configuración del sistema';
    });
});



//5. Ruta con request
Route::post('/procesar-datos', [DatosController::class, 'procesar']);

Route::view('/formulario', 'formulario');


// Versión de Juanra
//<?php
//
//use Illuminate\Support\Facades\Route;
//
//use Illuminate\Http\Request;
//
//use App\Http\Controllers\Datos;
//
//Route::get('/', function () {
//
//return view('welcome');
//});
//
//
//Route::get('/login', function () {
//
//return view('welcome');
//})->name('login');
//
//Route::get('/usuario/{id}', function ($id) {
//
//return "hola usuario " . $id;
//});
//
//
//Route::get('/contacto', function () {
//
//return "Página de contacto";
//})->name('contacto');
//
//
//Route::middleware(['auth'])->group(function () {
//Route::get('/admin/usuarios', function () {
//// Tu lógica aquí
//});
//
//Route::get('/admin/configuracion ', function () {
//// Tu lógica aquí
//});
//});
//
//
//
//Route::post('/procesar-datos', [Datos::class, 'procesar']);
//
//
//
//Route::get('/procesar-datos', [Datos::class, 'procesar']);


//ejercicio gestion libros:
Route::get('/libros',[LibroController::class,'index'])->name('libros.create');

//formulario alta
Route::get('libros/crear', [LibroController::class, 'create'])->name('libro.create');

//Post
Route::post('/libros', [LibroController::class, 'store'])->name('Libros.store');
