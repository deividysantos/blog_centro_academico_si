<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleicao extends Model
{
    use HasFactory;
    protected $table = 'eleicoes';

    public $timestamps  = false;

    protected $fillable = [
        'id',
        'ano',
        'usuario_id',
        'cargo_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
