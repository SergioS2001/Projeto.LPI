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
        Schema::create('presenças', function (Blueprint $table) {
            $table->id()->bigIncrements();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('data')->min(now());
            $table->float('entrada')->max(24.00);
            $table->float('saida');
            $table->float('horas');
            $table->integer('count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenças');
    }
};
