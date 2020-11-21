<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    //
    use SoftDeletes;

    public function items() {
        return $this->hasMany('App\Item');
    }

    public function comentarios() {
        return $this->hasManyThrough('App\Comentario', 'App\Item');
    }
}
