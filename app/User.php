<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'lastname', 'telephone', 'email', 'password', 'cidade', 'endereco', 'bairro', 'cep',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        return $this->hasOne(Admin::class);
    }

    public function membro() {
        return $this->hasMany(Membro::class);
    }
}
