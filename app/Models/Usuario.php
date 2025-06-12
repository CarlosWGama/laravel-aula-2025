<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable {

    use HasFactory, Notifiable;

    protected $fillable = [ 'nome', 'email', 'senha'];

    protected $hidden = [ 'senha', 'remember_token' ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'senha' => 'hashed',
        ];
    }

    //Informa que o campo comparado para senha no Auth é senha
    public function getAuthPassword() {
        return $this->senha; 
    }
}
