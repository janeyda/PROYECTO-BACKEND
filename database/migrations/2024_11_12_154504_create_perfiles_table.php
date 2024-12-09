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
       
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->foreignId('usuarios_id')->constrained('usuarios');
            $table->foreignId('rol_id')->constrained('roles');
            $table->timestamps();
        });





    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};
