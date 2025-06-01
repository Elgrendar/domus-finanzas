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
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->string('icono')->nullable(); // URL o ruta del icono
            $table->string('color')->nullable(); // Color asociado a la subcategoría
            $table->string('estado')->default('activa'); // 'activa' o 'inactiva'
            $table->string('tipo_subcategoria'); // 'ingreso' o 'gasto'
            $table->timestamps();// Timestamps for created_at and updated_at whit method timestamps()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategorias');
    }
};
