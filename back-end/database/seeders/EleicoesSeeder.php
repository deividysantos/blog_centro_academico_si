<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EleicoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eleicoes')->insert([
            'ano' => '1999',
            'usuario_id' => Usuario::where('email', 'deividyosantos27@gmail.com')->value('id'),
            'cargo_id' => Cargo::where('nivel_hierarquia', 'X')->value('id'),
        ]);
    }
}
