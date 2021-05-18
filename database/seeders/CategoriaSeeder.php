<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'id' => 1,
            'nome' => 'Pintor'
        ]);

        DB::table('categorias')->insert([
            'id' => 2,
            'nome' => 'Eletricista'
        ]);

        DB::table('categorias')->insert([
            'id' => 3,
            'nome' => 'Mecânico'
        ]);

        DB::table('categorias')->insert([
            'id' => 4,
            'nome' => 'Tecnologia'
        ]);

        DB::table('categorias')->insert([
            'id' => 5,
            'nome' => 'Aulas'
        ]);
    }
}
