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
        Schema::create('avaliacao_modulos', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('avaliações_id')->nullable()->references('id')->on('avaliações');
            $table->foreignId('modulos_id')->nullable()->references('id')->on('modulos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao_modulos');
    }
};
