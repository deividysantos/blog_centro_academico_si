<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestres extends Model
{
    use HasFactory;
    protected $table = 'semestres';

    public $timestamps = false;

    protected $fillable = [
        data_inicio,
        data_fim,
        descricao
    ];

    public function Eleicoes()
    {
        return $this->hasMany(Eleicoes::class);
    }
}
