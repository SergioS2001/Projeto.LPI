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
        Schema::create('questionario_aluno', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('orientação_estagios_id')->nullable()->references('id')->on('orientação_estagios');
            $table->integer('integração')->nullable()->default(0);
            $table->integer('acompanhamento')->nullable()->default(0);
            $table->integer('aquisição_conhecimentos')->nullable()->default(0);
            $table->integer('disponibilidade')->nullable()->default(0);
            $table->integer('satisfação')->nullable()->default(0);
            $table->integer('apoio_administrativo')->nullable()->default(0);
            $table->integer('apoio_orientador')->nullable()->default(0);
            $table->integer('apreciação_global')->nullable()->default(0);
            $table->string('sugestões')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionario_aluno');
    }
};
