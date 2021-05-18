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
            'nome' => 'Pintor',
            'icone' => 'fas fa-paint-roller',
        ]);

        DB::table('categorias')->insert([
            'id' => 2,
            'nome' => 'Eletricista',
            'icone' => 'fas fa-bolt',
        ]);

        DB::table('categorias')->insert([
            'id' => 3,
            'nome' => 'Mecânico',
            'icone' => 'fas fa-wrench',
        ]);

        DB::table('categorias')->insert([
            'id' => 4,
            'nome' => 'Tecnologia',
            'icone' => 'fas fa-laptop',
        ]);

        DB::table('categorias')->insert([
            'id' => 5,
            'nome' => 'Aulas',
            'icone' => 'fas fa-chalkboard-teacher',
        ]);
    }
}
