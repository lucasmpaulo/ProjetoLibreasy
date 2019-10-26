<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = "autores";

    public function livro() {
        return $this->hasMany('App\Livro', 'autor_id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }
}

