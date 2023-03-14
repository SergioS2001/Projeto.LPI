<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estagios', function (Blueprint $table) {           
            $table->id()->bigIncrements();
            $table->string('estagio_nome');
            $table->string('estagio_orientador');
            $table->string('estagio_servico');
            $table->string('estagio_tipologia');
            $table->integer('estagio_ano_curricular');
            $table->date('data_inicial');
            $table->date('data_final')->nullable();
            $table->string('estagio_avalicacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estagios');
    }
};
