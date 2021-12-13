<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeempresa');
            $table->string('nomefantasia')->nullable();
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('cep');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('cnpj');
            $table->string('logoEmpresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
