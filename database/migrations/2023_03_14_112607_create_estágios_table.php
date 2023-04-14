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
        Schema::create('estágios', function (Blueprint $table) {           
            $table->id()->bigIncrements();
            $table->string('nome')->unique();
            $table->boolean('isExterno')->default(false);
            $table->foreignId('instituição_estagio_id')->references('id')->on('Instituicao_Estagio')->onDelete('cascade');
            $table->foreignId('curso_estagio_id')->references('id')->on('Curso_Estagio')->onDelete('cascade');
            $table->foreignId('unidade_curricular_id')->references('id')->on('Unidade_Curricular')->onDelete('cascade');
            $table->integer('ano_curricular')->min(2)->max(6);
            $table->foreignId('serviços_id')->references('id')->on('Serviços')->onDelete('cascade');
            $table->foreignId('tipologia_estagio_id')->references('id')->on('Tipologia_Estagio')->onDelete('cascade');
            $table->date('data_inicial')->min(now());
            $table->date('data_final')->nullable()->min(now());
            $table->foreignId('presenças_id')->references('id')->on('Presenças')->onDelete('cascade');
            $table->foreignId('avaliacao_id')->references('id')->on('Avaliações')->onDelete('cascade');
            $table->foreignId('solicitacao_vagas_id')->nullable()->references('id')->on('Solicitacao_Vagas')->onDelete('cascade');
            $table->foreignId('estado_estagio_id')->nullable()->references('id')->on('Estado_Estagio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estágios');
    }
};
