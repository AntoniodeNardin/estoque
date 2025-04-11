<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome', 'email', 'senha_hash', 'tipo', 'ativo'
    ];

    protected $hidden = [
        'senha_hash',
    ];

    public function setSenhaHashAttribute($value)
    {
        $this->attributes['senha_hash'] = bcrypt($value);
    }
}
