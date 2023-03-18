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
        Schema::create('instituição', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->integer('id_user')->unique();
            $table->string('nome')->unique();
            $table->bigInteger('numero_aluno')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instituição');
    }
};
