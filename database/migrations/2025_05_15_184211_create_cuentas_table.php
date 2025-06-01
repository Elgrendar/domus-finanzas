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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo_cuenta');
            $table->decimal('saldo_inicial', 10, 2);
            $table->date('fecha_apertura');
            $table->string('moneda');
            $table->string('descripcion')->nullable();
            $table->string('estado')->default('activa');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->decimal('saldo_actual', 10, 2)->default(0);
            $table->decimal('limite_credito', 10, 2)->default(0);
            $table->string('numero_cuenta')->unique();
            $table->string('banco')->nullable();
            $table->timestamps();// Timestamps for created_at and updated_at whit method timestamps()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
