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
        // database/migrations/xxxx_xx_xx_create_peliculas_table.php
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('director', 150);
            $table->string('genero', 50);
            $table->text('sinopsis')->nullable();
            $table->date('fecha_estreno');
            $table->integer('duracion_min');
            $table->enum('clasificacion', ['ATP', '+7', '+13', '+18'])->default('ATP');
            $table->timestamps(); // incluye created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
