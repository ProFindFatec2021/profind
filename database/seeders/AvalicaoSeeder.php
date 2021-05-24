<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvalicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avaliacaos')->insert([
            'id' => 1,
            'anuncio_id' => 1,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'avaliacao' => 6,
        ]);
        DB::table('avaliacaos')->insert([
            'id' => 2,
            'anuncio_id' => 1,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'avaliacao' => 9.7,
        ]);
        DB::table('avaliacaos')->insert([
            'id' => 3,
            'anuncio_id' => 1,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'avaliacao' => 8,
        ]);
    }
}
