<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->string('descricao');
            $table->string('orcamentos');
            $table->string('urgencia');
            $table->string('ativo');
            $table->string('valorCliente');
            $table->string('diasEmAberto');
            $table->string('encerrarCliente');
            $table->string('encerrarPrestador');
            $table->string('fotosPedidos')->nullable();
            $table->string('prestador')->nullable();
            $table->string('pedido');//relaciona a tabela de área principal com a tabela de pedidos
            $table->string('especifico');//relaciona a tabela de area especifica com a tabela de pedidos
            $table->string('user');//relaciona a tabela de usuários com a tabela de pedidos
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
