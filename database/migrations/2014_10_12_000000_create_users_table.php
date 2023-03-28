<?php

use App\Models\Agendamento;
use App\Models\Estágios;
use App\Models\Instituicao;
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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('data_nascimento')->max(now());
            $table->bigInteger('cartão_cidadão')->unique();
            $table->bigInteger('telemóvel')->unique();
            $table->string('morada')->nullable()->max(255);
            $table->string('email_alternativo')->nullable();
            $table->smallInteger('tipo')->default(0)->max(1);
            $table->smallInteger('permissions')->default(0)->max(2);
            $table->foreignId('agendamentos_id')->references('id')->on('Agendamento')->onDelete('cascade');
            $table->foreignId('instituicaoaluno_id')->references('id')->on('InstituicaoAluno')->onDelete('cascade');
            $table->foreignId('estagio_id')->references('id')->on('Estágios')->onDelete('cascade');
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
