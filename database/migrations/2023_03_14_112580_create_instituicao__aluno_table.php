<?php

use App\Models\Curso;
use App\Models\Curso_Aluno;
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
            $table->string('nome')->unique();
            $table->bigInteger('numero_aluno')->unique();
            $table->foreignId('curso_aluno_id')->references('id')->on('Curso_Aluno')->onDelete('cascade');
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
