<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movimiento;
use App\Models\Cuenta;
use App\Models\FormaDePago;
use Carbon\Carbon;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de tener al menos una cuenta y una forma de pago
        $cuenta = Cuenta::first();
        $formaPago = FormaDePago::first();

        if (!$cuenta || !$formaPago) {
            $this->command->warn('No se encontraron cuentas o formas de pago. Asegúrate de ejecutar sus seeders primero.');
            return;
        }

        Movimiento::create([
            'fecha' => Carbon::now()->toDateString(),
            'tipo_movimiento' => 'ingreso',
            'descripcion' => 'Pago recibido por servicios',
            'importe' => 150.00,
            'cuenta_id' => $cuenta->id,
            'forma_pago_id' => $formaPago->id,
            'estado' => 'completado',
            'referencia' => 'INV-2025-001',
            'categoria' => 'Servicios',
            'subcategoria' => 'Consultoría',
        ]);

        Movimiento::create([
            'fecha' => Carbon::now()->toDateString(),
            'tipo_movimiento' => 'gasto',
            'descripcion' => 'Compra de material de oficina',
            'importe' => 45.50,
            'cuenta_id' => $cuenta->id,
            'forma_pago_id' => $formaPago->id,
            'estado' => 'pendiente',
            'referencia' => 'REC-2025-002',
            'categoria' => 'Oficina',
            'subcategoria' => 'Papelería',
        ]);
    }
}
