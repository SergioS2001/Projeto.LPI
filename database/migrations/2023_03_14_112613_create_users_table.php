<?php

use App\Models\Agendamento;
use App\Models\Estágios;
use App\Models\Historico;
use App\Models\Instituicao;
use App\Models\Instituicao_Aluno;
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
            $table->date('data_nascimento')->max(now())->nullable();
            $table->bigInteger('cartão_cidadão')->unique()->nullable();
            $table->bigInteger('telemóvel')->unique()->nullable();
            $table->string('morada')->nullable()->max(255);
            $table->string('email_alternativo')->nullable();
            $table->foreignId('instituicao_aluno_id')->references('id')->on('Instituicao_Aluno')->onDelete('cascade')->nullable();
            $table->foreignId('historico_id')->references('id')->on('Historico')->onDelete('cascade')->nullable();
            $table->smallInteger('tipo_aluno')->default(0)->max(1);
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
