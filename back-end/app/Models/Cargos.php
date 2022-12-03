<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $table = 'cargos';

    public $timestamps = false;

    protected $fillable = [
        nome,
        nivel_hierarquia
    ];

    public function Eleicoes()
    {
        return $this->hasMany(Eleicoes::class);
    }
}
