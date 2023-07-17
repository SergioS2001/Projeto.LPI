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
        Schema::create('solicitacao_vagas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estágios_id')->nullable()->references('id')->on('Estágios')->onDelete('cascade');
            $table->string('designação')->nullable();
            $table->string('objetivos')->nullable();
            $table->string('ano_letivo')->nullable();
            $table->integer('vagas')->nullable()->min(0);
            $table->integer('carga_horaria_total')->nullable()->min(0);
            $table->string('metodologia_avaliação;')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacao_vagas');
    }
};
