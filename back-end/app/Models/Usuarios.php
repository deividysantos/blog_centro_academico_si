<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        login,
        senha,
        url_foto,
        nome,
        email,
        telefone,
        inativo
    ];

    public function Eleicoes()
    {
        return $this->hasMany(Eleicoes::class);
    }
}
