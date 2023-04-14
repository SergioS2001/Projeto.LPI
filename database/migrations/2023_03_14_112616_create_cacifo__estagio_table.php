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
        Schema::create('cacifo_estagio', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('estágios_id')->references('id')->on('Estágios')->onDelete('cascade');
            $table->foreignId('cacifos_id')->constrained('Cacifos')->onDelete('cascade');
            $table->boolean('fardamento')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cacifo_estagio');
    }
};