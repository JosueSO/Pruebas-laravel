<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$categorias = DB::select('SELECT * FROM categorias');
        
        //$categorias = Categoria::all();
        $categorias = Categoria::onlyTrashed()->get();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $error = "";
        return view('categorias.create', compact('error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $item = new Categoria;

        $item->nombre = $request->nombre;
        if($item->nombre == "") {
            $error = "El nombre de la categoría no puede estar vacío";

            return view('categorias.create', compact('error'));
        }

        $item->color = $request->color;

        $item->save();
        //DB::insert('INSERT INTO categorias(nombre, color) VALUES(?, ?)', [$nombre, $color]);

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // //
        // $title = 'Categorias';

        // $items = ['Item 1', 'Item 2', 'Item 3'];

        // return view("categorias", compact('id', 'title', 'items'));

        // $categorias = DB::select('SELECT * FROM categorias WHERE id = ?', [$id]);

        // $item = $categorias[0];

        //Categoria::withTrashed()->where('id', $id)->forceDelete();

        $item = Categoria::find($id);

        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $categorias = DB::select('SELECT * FROM categorias WHERE id = ?', [$id]);

        // $item = $categorias[0];
        $item = Categoria::find($id);

        $error = "";
        return view('categorias.edit', compact('error', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $categorias = DB::select('SELECT * FROM categorias WHERE id = ?', [$id]);

        // $item = $categorias[0];
        $item = Categoria::find($id);

        $item->nombre = $request->nombre;
        if($item->nombre == "") {
            $error = "El nombre de la categoría no puede estar vacío";

            return view('categorias.edit', compact('error', 'item'));
        }

        $item->color = $request->color;

        $respuesta = $item->save();
        // $respuesta = DB::update('UPDATE categorias SET nombre = ?, color = ? WHERE id = ?', 
        //     [$nombre, $color, $id]);

        if($respuesta == 0) {
            $error = "Error al actualizar el registro, inténtelo de nuevo";

            return view('categorias.edit', compact('error', 'item'));
        }

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //DB::delete('DELETE FROM categorias WHERE id = ?', [$id]);

        Categoria::destroy($id);

        return redirect()->route('categorias.index');
    }

    public function byName($nombre) 
    {
        $categorias = Categoria::where('nombre', '!=', $nombre)->orderBy('color', 'desc')->get();

        // $color = "#43016f";

        // $categorias = Categoria::where('nombre', '!=', $nombre)->where('color', $color)->get();

        return $categorias;
    }

    public function incluirEliminados()
    {
        //$categorias = Categoria::withTrashed()->get();

        var_dump($categorias);
        //return $categorias;
    }
}
