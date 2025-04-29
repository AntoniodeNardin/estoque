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
        'nome', 'email', 'senha', 'tipo', 'ativo'
    ];

    protected $hidden = [
        'senha',
    ];

    public function setSenhaHashAttribute($value)
    {
        $this->attributes['senha'] = bcrypt($value);
    }
}
