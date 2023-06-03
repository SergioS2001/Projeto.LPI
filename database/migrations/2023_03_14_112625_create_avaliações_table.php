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
        Schema::create('avaliações', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->foreignId('orientação_estagios_id')->nullable()->references('id')->on('orientação_estagios');
            $table->integer('module_count')->nullable()->default(1)->maxValue(6);
            $table->float('nota_final')->nullable()->minValue(1.0)->maxValue(20.0);
            $table->boolean('isDone')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliações');
    }
};
