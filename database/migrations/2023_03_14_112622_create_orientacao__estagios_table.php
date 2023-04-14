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
        Schema::create('orientação_estagios', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('orientadores_id')->references('id')->on('Orientadores')->onDelete('cascade');
            $table->foreignId('estágios_id')->references('id')->on('Estágios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orientação_estagios');
    }
};
