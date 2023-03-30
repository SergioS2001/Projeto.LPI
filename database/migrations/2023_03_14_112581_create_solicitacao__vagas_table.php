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
            $table->bigInteger('ano_letivo');
            $table->integer('vagas')->min(0);
            $table->integer('carga_horaria_total')->min(0);
            $table->string('objetivos');
            $table->boolean('isExterno')->default(false);
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
