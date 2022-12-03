<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicoes extends Model
{
    use HasFactory;
    protected $table = 'eleicoes';

    public $timestamps  = false;

    protected $fillable = [
        id_eleicao,
        id_semestre,
        id_usuario,
        id_cargo
    ];

    public function semestre()
    {
        return $this->belongsTo(Semestres::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }
}
