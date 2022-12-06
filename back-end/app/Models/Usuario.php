<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'id',
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
        return $this->hasMany(Eleicao::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function isAdmin(): bool
    {
        return $this->id === DB::table('usuarios')
                                ->join('eleicoes', 'usuarios.id','=', 'eleicoes.usuario_id')
                                ->join('cargos', 'eleicoes.cargo_id', '=', 'cargos.id')
                                ->where('cargos.nivel_hierarquia', '=', 'X')
                                ->select('usuarios.id')
                                ->value('id');
    }

    public function isPresident(): bool
    {
        return $this->id === DB::table('usuarios')
                                ->join('eleicoes', 'usuarios.id','=', 'eleicoes.usuario_id')
                                ->join('cargos', 'eleicoes.cargo_id', '=', 'cargos.id')
                                ->where('cargos.nivel_hierarquia', '=', 'A')
                                ->select('usuarios.id')
                                ->value('id');
    }

    public function isAdminOrPresident(): bool
    {
        return $this->id === DB::table('usuarios')
                                ->join('eleicoes', 'usuarios.id','=', 'eleicoes.usuario_id')
                                ->join('cargos', 'eleicoes.cargo_id', '=', 'cargos.id')
                                ->where('cargos.nivel_hierarquia', '=', 'X')
                                ->orWhere('cargos.nivel_hierarquia', '=', 'A')
                                ->select('usuarios.id')
                                ->value('id');
    }
}
