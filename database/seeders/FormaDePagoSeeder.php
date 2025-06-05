<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormaDePago;

class FormaDePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formas = [
            ['nombre' => 'Efectivo', 'tipo_pago' => 'contado', 'descripcion' => 'Pago directo en efectivo','estado' => 'activa'],
            ['nombre' => 'Tarjeta de crédito', 'tipo_pago' => 'bancario', 'descripcion' => 'Pago mediante tarjeta de crédito','estado' => 'activa'],
            ['nombre' => 'Transferencia bancaria', 'tipo_pago' => 'bancario', 'descripcion' => 'Pago por transferencia','estado' => 'activa'],
            ['nombre' => 'Bizum', 'tipo_pago' => 'móvil', 'descripcion' => 'Pago móvil con Bizum','estado' => 'activa'],
        ];

        foreach ($formas as $forma) {
            FormaDePago::create($forma);
        }
    }
}
