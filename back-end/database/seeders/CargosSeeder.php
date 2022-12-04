<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            [
                'nome' => 'Presidente',
                'nivel_hierarquia' => 'A',
            ],
            [
                'nome' => 'Vice-Presidente',
                'nivel_hierarquia' => 'B',
            ],
            [
                'nome' => 'Secretario(a)',
                'nivel_hierarquia' => 'C',
            ],
            [
                'nome' => 'Vice-Secretario(a)',
                'nivel_hierarquia' => 'D',
            ],
            [
                'nome' => 'Tesoureiro(a)',
                'nivel_hierarquia' => 'E',
            ],[
                'nome' => 'Vice-Tesoureiro(a)',
                'nivel_hierarquia' => 'F',
            ],
            [
                'nome' => 'Comunicação',
                'nivel_hierarquia' => 'G',
            ],
            [
                'nome' => 'Suplente',
                'nivel_hierarquia' => 'H',
            ],
        ];

        foreach ($cargos as $cargo)
        {
            DB::table('cargos')->insert([
                'nome' => $cargo['nome'],
                'nivel_hierarquia' => $cargo['nivel_hierarquia'],
            ]);
        }
    }
}
