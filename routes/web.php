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

//Insertar datos
Route::get('/insert', function(){
    $nombre = "Categoría 2";
    $color = "RED";

    //INSERT INTO {TABLA}({COLUMNA1}, {COLUMNA2}) VALUES({VALOR1}, {VALOR2})
    DB::insert('INSERT INTO categorias(nombre, color) VALUES(?, ?)', [$nombre, $color]);
});

//Leer todos los registros
Route::get('/read', function(){
    //SELECT {columna1}, {columna2}, etc. FROM {TABLA} 
    // * -> Todas las columnas
    $categorias = DB::select('SELECT * FROM categorias');

    return $categorias;
});

//Leer registro por ID
Route::get('/read/{id}', function($id){
    //SELECT {columna1}, {columna2}, etc. FROM {TABLA} WHERE {columnaX} = {valor}
    // * -> Todas las columnas
    $categorias = DB::select('SELECT * FROM categorias WHERE id = ?', [$id]);

    foreach($categorias as $categoria){
        return $categoria->nombre . " " . $categoria->color;
    }
});

//Actualizar información de un registro
Route::get('/update/{id}', function($id){
    //UPDATE {TABLA} SET {COLUMNAX} = {VALOR} WHERE {COLUMNAY} = {VALOR2}
    $respuesta = DB::update('UPDATE categorias SET color = ? WHERE id = ?', ['BLUE', $id]);

    return $respuesta;
});

//Borrar un registro
Route::get('/delete/{id}', function($id){
    //DELETE FROM {TABLA} WHERE {COLUMNAX} = {VALOR}
    $respuesta = DB::delete('DELETE FROM categorias WHERE id = ?', [$id]);

    return $respuesta;
});