<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copia extends Model
{
    protected $table = "copias";

    public function livro() {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'livro_id', 'id');
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function locacao() {
        return $this->hasOne(Locacao::class, 'livro_id', 'id');
    }
}
