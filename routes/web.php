<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/tarea', function() {
//     //return 'Esta es la página de tareas';

//     return redirect()->route('catX');
// });

// Route::get('/tarea/{id}/{nombre}', function($id, $nombre) {
//     return 'Página de la tarea ' . $id . ' con el nombre ' . $nombre;
// });

// Route::get('/menu1/submenu3/categoriaX', function(){
//     return 'Página de prueba';
// })->name('catX');

Route::get('/prueba', 'PruebaController@index');

Route::resource('categorias', 'CategoriasController');