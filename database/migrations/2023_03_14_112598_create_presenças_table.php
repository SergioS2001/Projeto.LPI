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
            $table->float('h_saida')->min(0.0)->max(24.00);;
            $table->float('horas_mes');
            $table->integer('count_dias')->default(0);
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
