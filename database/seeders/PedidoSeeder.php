<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'id' => 1,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'anuncio_id' => 1,
            'status' => 'Oferta feita',
            'descricao' => 'Teste teste teste',
            'preco' => 500,
            'aceito' => true,
            'recusado' => false,
            'visto' => true,
        ]);
        DB::table('pedidos')->insert([
            'id' => 2,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'anuncio_id' => 2,
            'status' => 'Oferta feita',
            'descricao' => 'Teste teste teste',
            'preco' => 400,
            'aceito' => false,
            'recusado' => true,
            'visto' => true,
        ]);
        DB::table('pedidos')->insert([
            'id' => 3,
            'profissional_id' => 2,
            'cliente_id' => 3,
            'anuncio_id' => 3,
            'status' => 'Oferta feita',
            'descricao' => 'Teste teste teste',
            'preco' => 250.50,
            'aceito' => false,
            'recusado' => false,
            'visto' => false,
        ]);
    }
}
