<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = "locacoes";

    public function aluno() {
        return $this->belongsTo(Locacao::class, 'aluno_id', 'id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'biblioteca', 'id');
    }
    public function livro() {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }
    public function copia() {
        return $this->belongsTo(Copia::class, 'livro_id', 'id');
    }
}
