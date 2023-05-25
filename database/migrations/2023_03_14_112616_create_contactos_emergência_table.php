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
        Schema::create('contactos_emergência', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->string('nome')->nullable();
            $table->string('telemóvel')->nullable();
            $table->string('grau_parentesco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos_emergência');
    }
};
