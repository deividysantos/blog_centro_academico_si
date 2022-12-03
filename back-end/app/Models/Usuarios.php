<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Usuarios extends Authenticable implements JWTSubject
{
    use HasFactory;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'login',
        'senha',
        'url_foto',
        'nome',
        'email',
        'telefone',
        'inativo'
    ];

    protected $hidden = [
        'senha'
    ];

    public function Eleicoes()
    {
        return $this->hasMany(Eleicoes::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
