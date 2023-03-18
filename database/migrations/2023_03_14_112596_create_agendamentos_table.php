<?php

use App\Models\Tipo_Agendamento;
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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->foreignId('tipo_agendamento_id')->references('id')->on('Tipo_Agendamento')->onDelete('cascade');;
            $table->date('data');
            $table->string('descrição');
            $table->float('duração');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
