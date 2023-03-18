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
            $table->foreignId('id_caução')->constrained('Cauções')->onDelete('cascade');;
            $table->float('valor');
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
