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
        Schema::create('evento', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->string('nome')->max(255);
            $table->string('descrição')->nullable()->max(255);
            $table->date('data');
            $table->float('hora')->min(0.0)->max(24.0);
            $table->integer('duração')->nullable()->min(0);
            $table->boolean('isAccepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};
