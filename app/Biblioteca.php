<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{    
    protected $table = "bibliotecas";

    public function livro() {
        return $this->hasMany('App\Livro', 'biblioteca_id');
    }

    public function membro() {
        return $this->belongsTo('App\Membro');
    }

    public function autor() {
        return $this->hasMany(Autor::class, 'biblioteca_id');
    }

    public function categoria() {
        return $this->hasMany(Categoria::class, 'biblioteca_id');
    }
    public function editora() {
        return $this->hasMany(Editora::class, 'biblioteca_id');
    }
    public function copia() {
        return $this->hasMany(Copia::class, 'livro_id', 'id');
    }
    public function aluno() {
        return $this->hasMany(Aluno::class, 'biblioteca_id', 'id');
    }
    public function locacao() {
        return $this->hasMany(Locacao::class, 'biblioteca_id', 'id');
    }
}
