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
        Schema::create('cacifos', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->bigInteger('numero')->unique();
            $table->foreignId('cauções_id')->constrained('Cauções')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cacifos');
    }
};
