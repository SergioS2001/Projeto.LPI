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
        Schema::create('instituicao_aluno', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->string('nome')->nullable()->unique();
            $table->string('numero_aluno')->nullable()->unique();
            $table->foreignId('curso_aluno_id')->nullable()->references('id')->on('Curso_Aluno')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituicao_aluno');
    }
};
