<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    public function item() {
        return $this->belongsTo('App\Item');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
