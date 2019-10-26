<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function livro() {
        return $this->hasMany('App\Livro', 'categoria_id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }
}
