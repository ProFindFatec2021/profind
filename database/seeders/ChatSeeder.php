<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            'id' => 1,
            'destinatario_id' => 2,
            'remetente_id' => 3,
            'visto' => true,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
        DB::table('chats')->insert([
            'id' => 2,
            'destinatario_id' => 2,
            'remetente_id' => 3,
            'visto' => false,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
        DB::table('chats')->insert([
            'id' => 3,
            'destinatario_id' => 2,
            'remetente_id' => 3,
            'visto' => false,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
        DB::table('chats')->insert([
            'id' => 4,
            'destinatario_id' => 3,
            'remetente_id' => 2,
            'visto' => true,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
        DB::table('chats')->insert([
            'id' => 5,
            'destinatario_id' => 3,
            'remetente_id' => 2,
            'visto' => false,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
        DB::table('chats')->insert([
            'id' => 6,
            'destinatario_id' => 3,
            'remetente_id' => 2,
            'visto' => false,
            'mensagem' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque voluptatibus est, possimus error quasi et repellendus sapiente fugiat praesentium? Suscipit veniam possimus fugit similique nulla velit quae, praesentium obcaecati!',
            'created_at' => Carbon::now()
        ]);
    }
}
