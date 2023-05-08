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
        Schema::create('presenças', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('users_id')->nullable()->references('id')->on('users');
            $table->foreignId('estágios_id')->nullable()->references('id')->on('Estágios')->onDelete('cascade');
            $table->date('data')->nullable()->min(now());
            $table->time('h_entrada')->nullable();
            $table->time('h_saida')->nullable();
            $table->integer('tempo_pausa')->nullable();
            $table->time('horas_dia')->nullable();
            $table->time('horas_mes')->nullable();
            $table->time('total_horas')->nullable();
            $table->integer('count_presenças')->nullable()->default(0);
            $table->boolean('isValidated')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenças');
    }
};
