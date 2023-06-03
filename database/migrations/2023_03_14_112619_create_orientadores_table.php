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
        Schema::create('orientadores', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('users_id')->nullable()->references('id')->on('Users')->onDelete('cascade');
            $table->string('celula_profissional')->nullable()->unique();
            $table->date('admissao')->nullable();
            $table->date('validade')->nullable();
            $table->string('responsavel_assinatura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orientadores');
    }
};
