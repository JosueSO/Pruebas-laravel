<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Telefono;

class UsuariosController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('users.index', compact('users'));
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
        return view('users.create', compact('error'));
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
        $user = new User;

        if($request->name == "") {
            $error = "El nombre del usuario no puede estar vacío";

            return view('users.create', compact('error'));
        }

        if($request->email == "") {
            $error = "El nombre del usuario no puede estar vacío";

            return view('users.create', compact('error'));
        }

        if($request->email != $request->confirm_email) {
            $error = "El correo de confirmación no coincide";

            return view('users.create', compact('error'));
        }

        if($request->password != $request->confirm_password) {
            $error = "Las contraseñas no coinciden";

            return view('users.create', compact('error'));
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        if ($request->telefono != "") {
            $telefono = new Telefono;
            $telefono->numero = $request->telefono;

            $user->telefono()->save($telefono);
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        User::destroy($id);

        return redirect()->route('users.index');
    }

    /**
     * Página perfil del usuario
     * 
     * @return \Illuminate\Http\Response
     */
    public function miPerfil()
    {
        //
        return view('users.perfil');
    }

    /**
     * Página del administrador
     * 
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        //
        return view('users.admin');
    }
}
