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
            $table->string('orientador');
            $table->string('servico');
            $table->string('tipologia');
            $table->integer('ano_curricular');
            $table->date('data_inicial');
            $table->date('data_final')->nullable();
            $table->integer('avaliacao');
            $table->integer('presenças');
            $table->integer('cacifos');
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
