<?php

use App\Models\Cauções;
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
        Schema::create('cauções', function (Blueprint $table) {
            $table->id()->bigIncrements();
            $table->float('valor')->min(0.0);
            $table->boolean('isPago')->default('False');
            $table->boolean('isDevolvido')->default('False');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauções');
    }
};
