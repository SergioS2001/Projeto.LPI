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
        Schema::create('user_agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agendamentos_id')->nullable()->references('id')->on('agendamentos');
            $table->foreignId('users_id')->nullable()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_agendamentos');
    }
};
