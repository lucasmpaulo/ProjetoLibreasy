<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = "alunos";

    public function livro() {
        return $this->hasOne('App\Livro', 'autor_id');
    }
    public function copia() {
        return $this->hasOne(Copia::class, 'livro_id', 'id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }
    public function locacao(){
        return $this->hasMany(Locacao::class, 'aluno_id', 'id');
    }
}
