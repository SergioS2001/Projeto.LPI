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
            $table->foreignId('estágios_id')->nullable()->references('id')->on('Estágios')->onDelete('cascade');
            $table->date('data')->nullable()->min(now());
            $table->float('h_entrada')->nullable()->min(0.0)->max(24.00);
            $table->float('h_saida')->nullable()->min(0.0)->max(24.00);
            $table->float('h_pausa')->nullable()->max(24.00);
            $table->float('horas_dia')->nullable()->min(0.0)->max(24.00);
            $table->float('horas_mes')->nullable()->min(0.0);
            $table->float('total_horas')->nullable()->min(0.0);
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
