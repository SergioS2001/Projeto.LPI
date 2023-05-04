<?php

use App\Models\Presenças;
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
        Schema::create('historico', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('agendamentos_id')->references('id')->on('Agendamentos')->onDelete('cascade');
            $table->foreignId('estágios_id')->references('id')->on('Estágios')->onDelete('cascade');
            $table->foreignId('presenças_id')->references('id')->on('Presenças')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico');
    }
};
