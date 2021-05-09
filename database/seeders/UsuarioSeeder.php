<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'id' => 1,
            'nome' => 'Admin',
            'telefone' => '0',
            'email' => 'brunobrasolinc@gmail.com',
            'senha' => md5('12345'),
            'tipo' => 2,
        ]);

        DB::table('usuarios')->insert([
            'id' => 2,
            'nome' => 'Profissional',
            'telefone' => '(13) 99999-9999',
            'email' => 'pro@pro.com.br',
            'senha' => md5('pro@pro.com.br'),
            'tipo' => 1,
        ]);

        DB::table('usuarios')->insert([
            'id' => 3,
            'nome' => 'Cliente',
            'telefone' => '(13) 11111-1111',
            'email' => 'cli@pro.com.br',
            'senha' => md5('pro@pro.com.br'),
            'tipo' => 0,
        ]);
    }
}
