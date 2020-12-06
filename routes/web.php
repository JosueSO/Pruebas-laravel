<?php

use Illuminate\Support\Facades\Route;

use App\User;
use App\Categoria;
use App\Telefono;
use App\Item;
use App\Comentario;
use App\Genero;
use Illuminate\Http\Request;

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

Route::get('/app/items/{id}', 'AplicacionController@item')->name('app.item');

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

//Route::get('/prueba', 'PruebaController@index');

Route::resource('users', 'UsuariosController');

Route::get('/perfil', 'UsuariosController@miPerfil')->name('users.pefil');

Route::get('/administrador', 'UsuariosController@admin')
->name('users.admin')->middleware('auth');

Route::resource('categorias', 'CategoriasController');

Route::get('/categorias/byName/{nombre}', 'CategoriasController@byName');

Route::get('/categorias/incluirEliminados', 'CategoriasController@incluirEliminados');

Route::resource('generos', 'GenerosController');

Route::resource('items', 'ItemsController');

/*

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

*/

/*
// Uno a uno
Route::get('/users/{id}/telefono', function($id) {
    $user_telefono = User::find($id)->telefono;

    return $user_telefono;
});

Route::get('/telefonos/{id}/usuario', function($id) {
    $user_telefono = Telefono::find($id)->user;

    return $user_telefono;
});

// Uno a muchos
Route::get('/categorias/{id}/items', function($id) {
    $categoria_items = Categoria::find($id)->items;

    return $categoria_items;
});

Route::get('/items/{id}/categoria', function($id) {
    $item_categoria = Item::find($id)->categoria;

    return $item_categoria;
});

Route::get('/categorias/{id}/comentarios', function($id) {
    $categoria_comentarios = Categoria::find($id)->comentarios;

    return $categoria_comentarios;
});

// Muchos a muchos
Route::get('/items/{id}/generos', function($id) {
    $item_generos = Item::find($id)->generos;

    return $item_generos;
});

Route::get('/generos/{id}/items', function($id) {
    $genero_items = Genero::find($id)->items;

    return $genero_items;
});

*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Pruebas sessiones
 */

Route::get('/sesiones', function(Request $request) {
    $request->session()->put('carrito', []);

    return session()->all();
});

Route::get('/agregacarrito/{id}', function(Request $request, $id){
    $objeto = ["id" => $id, "cant" => 1];

    $carrito = session('carrito');

    $nuevo_carrito = [];

    $en_carrito = false;
    foreach ($carrito as $item) {
        if ($item["id"] === $id) {
            $item["cant"] += $objeto["cant"];
            $en_carrito = true;
        }

        $nuevo_carrito[] = $item;
    }

    if (!$en_carrito) {
        $nuevo_carrito[] = $objeto;
    }

    // return $nuevo_carrito;
    session(['carrito' => $nuevo_carrito]);

    return session()->all();
});

Route::get('/quitacarrito/{id}', function(Request $request, $id){
    $carrito = session('carrito');

    $nuevo_carrito = [];

    foreach ($carrito as $item) {
        if ($item["id"] === $id) {
            $item["cant"] -= 1;
        }

        if ($item["cant"] !== 0) {
            $nuevo_carrito[] = $item;
        }
    }

    // return $nuevo_carrito;
    session(['carrito' => $nuevo_carrito]);

    return session()->all();
});

Route::get('/carrito', function(Request $request) {
    return session("carrito");
});