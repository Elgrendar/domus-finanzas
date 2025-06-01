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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->string('tipo_categoria'); // 'ingreso' o 'gasto'
            $table->string('icono')->nullable(); // URL o ruta del icono
            $table->string('color')->nullable(); // Color asociado a la categoría
            $table->string('estado')->default('activa'); // 'activa' o 'inactiva'
            $table->timestamps();// Timestamps for created_at and updated_at whit method timestamps()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
