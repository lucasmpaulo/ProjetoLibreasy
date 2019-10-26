<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";

    public function livro() {
        return $this->belongsTo(Livro::class, 'status_id', 'id');
    }
    
    public function copia() {
        return $this->belongsTo(Copia::class, 'status_id', 'id');
    }
}
