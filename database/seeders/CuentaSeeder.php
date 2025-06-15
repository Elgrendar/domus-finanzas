<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuenta;
use App\Models\User;
use Carbon\Carbon;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = User::first();

        if (!$usuario) {
            $this->command->warn('No se encontró ningún usuario. Asegúrate de tener usuarios creados antes de ejecutar este seeder.');
            return;
        }

        Cuenta::create([
            'nombre' => 'Cuenta Corriente Banco X',
            'tipo_cuenta' => 'corriente',
            'saldo_inicial' => 1000.00,
            'fecha_apertura' => Carbon::parse('2023-01-15'),
            'moneda' => 'EUR',
            'descripcion' => 'Cuenta principal del banco X',
            'estado' => 'activa',
            'user_id' => $usuario->id,
            'saldo_actual' => 1000.00,
            'limite_credito' => 500.00,
            'numero_cuenta' => 'ES7620770024003102575766',
            'banco' => 'Banco X',
        ]);
    }
}
