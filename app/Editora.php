<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{    
    public function livro() {
        return $this->hasMany(Livro::class, 'editora_id');
    }
    public function biblioteca() {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }
}
