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
            'nome' => 'Admin',
            'telefone' => '0',
            'email' => 'brunobrasolinc@gmail.com',
            'senha' => md5('12345'),
            'tipo' => 2,
        ]);
    }
}
