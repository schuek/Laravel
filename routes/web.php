<?php //Versión propia

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\DatosController;

//gestion de libros
use App\Http\Controllers\LibroController;
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
// 1. LISTADO GENERAL (Faltaba esta)
Route::get('/libro', [LibroController::class, 'index'])->name('libro.index');

// 2. ALTA (GET):
Route::get('/libro/alta', [LibroController::class, 'create'])->name('libro.create');

// 3. ALTA (POST): Guardar datos
Route::post('/libro/alta', [LibroController::class, 'store'])->name('libro.store');

// 4. CONSULTAR DETALLE (GET)
// Esta ruta "atrapa" cualquier cosa después de /libro/, por eso va al final
Route::get('/libro/{id}', [LibroController::class, 'show'])->name('libro.show');

// 5. BORRAR (DELETE)
Route::delete('/libro/{id}', [LibroController::class, 'destroy'])->name('libro.destroy');
// 5. EDITAR (GET): Muestra el formulario con los datos del libro
Route::get('/libro/{id}/editar', [LibroController::class, 'edit'])->name('libro.edit');

// 6. ACTUALIZAR (PUT): Guarda los cambios
Route::put('/libro/{id}', [LibroController::class, 'update'])->name('libro.update');
