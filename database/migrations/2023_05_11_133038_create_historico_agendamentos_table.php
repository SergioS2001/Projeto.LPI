<?php

use App\Models\Agendamentos;
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
        Schema::create('historico_agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agendamentos_id')->nullable()->references('id')->on('agendamentos');
            $table->foreignId('orientação_estagios_id')->nullable()->references('id')->on('orientação_estagios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_agendamentos');
    }
};
