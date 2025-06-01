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
        Schema::create('formas_de_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('tipo_pago');
            $table->string('descripcion')->nullable();
            $table->string('estado')->default('activa');
            $table->timestamps();// Timestamps for created_at and updated_at whit method timestamps()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_de_pagos');
    }
};
