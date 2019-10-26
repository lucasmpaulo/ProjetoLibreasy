<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{ 
    public function membro(){
        return $this->hasOne('App\Membro');
    }
}
