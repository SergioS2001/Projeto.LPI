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
            $table->string('first_name')->unique();
            $table->string('last_name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('type')->default(0); //normalUser=0   adminUser=1
            $table->unsignedBigInteger('user_telemovel')->unique();
            $table->integer('user_idade');
            $table->unsignedBigInteger('user_cartao_cidadao')->unique();
            $table->string('user_instituicao');
            $table->unsignedBigInteger('user_numero_aluno')->unique();
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
