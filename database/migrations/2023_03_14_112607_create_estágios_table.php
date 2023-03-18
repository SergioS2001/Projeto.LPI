<?php

use App\Models\Cacifos;
use App\Models\Instituicao;
use App\Models\Orientador;
use App\Models\Presenças;
use App\Models\Servico;
use App\Models\Serviços;
use App\Models\Tipologia;
use App\Models\Unidade_Curricular;
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
        Schema::create('estágios', function (Blueprint $table) {           
            $table->id()->bigIncrements();
            $table->foreignId('orientador_id')->constrained()->onDelete('cascade');;
            $table->foreignId('instituição_id')->references('id')->on('Instituição')->onDelete('cascade');; 
            $table->foreignId('curso_id')->constrained()->onDelete('cascade');;
            $table->foreignId('unidade_curricular_id')->references('id')->on('Unidade_Curricular')->onDelete('cascade');; 
            $table->integer('ano_curricular')->min(2)->max(6);
            $table->string('nome')->unique();
            $table->foreignId('serviços_id')->references('id')->on('Serviços')->onDelete('cascade');; 
            $table->foreignId('tipologia_id')->references('id')->on('Tipologia')->onDelete('cascade');;
            $table->date('data_inicial')->min(now());
            $table->date('data_final')->nullable()->min(now());
            $table->float('avaliação')->min(0.0)->max(20.0);
            $table->foreignId('presenças_id')->references('id')->on('Presenças')->onDelete('cascade');; 
            $table->foreignId('cacifos_id')->references('id')->on('Cacifos')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estágios');
    }
};
