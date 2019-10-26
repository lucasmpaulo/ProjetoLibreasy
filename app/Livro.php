<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
    'titulo', 'subtitulo', 'descricao', 'anoLivro', 'numPagina', 'numeroCopias', 'edicao',
    'autor_id', 'editora_id', 'categoria_id', 'biblioteca_id', 'status_id',
];
    
    public function editora() {
        return $this->belongsTo(Editora::class, 'editora_id', 'id');
    }
    public function autores() {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }
    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function copia() {
        return $this->hasMany(Copia::class, 'livro_id', 'id');
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function locacao() {
        return $this->hasOne(Locacao::class, 'livro_id', 'id');
    }
}
