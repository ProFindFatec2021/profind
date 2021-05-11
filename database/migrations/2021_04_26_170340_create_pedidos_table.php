<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissional_id')->constrained('usuarios');
            $table->foreignId('cliente_id')->constrained('usuarios');
            $table->foreignId('anuncio_id')->constrained('anuncios');
            $table->string('status');
            $table->text('descricao')->nullable();
            $table->integer('preco');
            $table->boolean('aceito')->default(false);
            $table->boolean('recusado')->default(false);
            $table->boolean('visto')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
