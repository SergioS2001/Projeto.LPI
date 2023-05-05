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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('users_id')->nullable()->references('id')->on('users');
            $table->string('nome')->max(255);
            $table->foreignId('tipo_agendamento_id')->references('id')->on('Tipo_Agendamento')->onDelete('cascade');
            $table->date('data');
            $table->float('hora')->min(0.0)->max(24.0);
            $table->string('descrição')->max(255);
            $table->integer('duração')->min(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
