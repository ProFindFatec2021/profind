<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(AnuncioSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(ChatSeeder::class);
        $this->call(AvalicaoSeeder::class);
    }
}
