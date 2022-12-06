<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'login' => 'Deividy',
            'senha' => Hash::make(getenv('PASS')),
            'email' => 'deividyosantos27@gmail.com',
            'inativo' => 'N',
        ]);
    }
}
