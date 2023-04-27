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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->string('google_id')->nullable();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->date('data_nascimento')->max(now())->nullable();
            $table->bigInteger('cartão_cidadão')->unique()->nullable();
            $table->bigInteger('telemóvel')->unique()->nullable();
            $table->string('morada')->nullable()->max(255);
            $table->string('email_alternativo')->nullable();
            $table->foreignId('instituicao_aluno_id')->nullable()->references('id')->on('Instituicao_Aluno')->onDelete('cascade');
            $table->foreignId('historico_id')->nullable()->references('id')->on('Historico')->onDelete('cascade');
            $table->boolean('isExterno')->default(false);
            $table->smallInteger('permissions')->default(0)->max(2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
