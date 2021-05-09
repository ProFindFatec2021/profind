<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anuncios')->insert([
            'id' => 1,
            'nome' => 'Teste 1',
            'descricao' => 'Teste 1',
            'usuario_id' => 2,
            'categoria_id' => 1,
        ]);
        DB::table('anuncios')->insert([
            'id' => 2,
            'nome' => 'Teste 2',
            'descricao' => 'Teste 2',
            'usuario_id' => 2,
            'categoria_id' => 2,
        ]);
        DB::table('anuncios')->insert([
            'id' => 3,
            'nome' => 'Teste 3',
            'descricao' => 'Teste 3',
            'usuario_id' => 2,
            'categoria_id' => 3,
        ]);
    }
}
