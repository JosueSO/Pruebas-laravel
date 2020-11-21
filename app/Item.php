<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }

    public function comentarios() {
        return $this->hasMany('App\Comentario');
    }

    public function generos() {
        return $this->belongsToMany('App\Genero');
    }
}
