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
            $table->date('data')->min(now());
            $table->float('h_entrada')->min(0.0)->max(24.00);
            $table->float('h_saida')->min(0.0)->max(24.00);
            $table->float('h_pausa')->min(0.0)->max(24.00);
            $table->float('horas_dia')->min(0.0)->max(24.00);
            $table->float('horas_mes')->min(0.0);
            $table->float('total_horas')->min(0.0);
            $table->integer('count_presenças')->default(0);
            $table->boolean('isValidated')->default(false);
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
