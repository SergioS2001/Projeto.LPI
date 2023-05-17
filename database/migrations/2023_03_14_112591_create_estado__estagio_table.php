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
        Schema::create('estado_estagio', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->boolean('solicitado')->default(false);
            $table->boolean('waiting')->default(false);
            $table->boolean('admitido')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_estagio');
    }
};