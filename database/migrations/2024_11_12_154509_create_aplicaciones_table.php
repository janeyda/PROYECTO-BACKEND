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
        Schema::create('aplicaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('encuestas_id')->constrained('encuestas')->onDelete('cascade');
            $table->foreignId('ciclo_id')->constrained('ciclo')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplicaciones');
    }
};
