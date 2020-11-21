<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    //
    public function item($id) 
    {
        return view('aplicacion.item');
    }
}
