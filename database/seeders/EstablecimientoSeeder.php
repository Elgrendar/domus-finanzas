<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Establecimiento;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $establecimientos = [
            [
                'nombre' => 'Herbolario Central',
                'direccion' => 'Calle Mayor 123, Madrid',
                'telefono' => '912345678',
                'email' => 'central@herbolario.com',
                'tipo_establecimiento' => 'Tienda física',
                'descripcion' => 'Sucursal principal con productos naturales',
            ],
            [
                'nombre' => 'Green Market Online',
                'direccion' => 'www.greenmarket.com',
                'telefono' => null,
                'email' => 'contacto@greenmarket.com',
                'tipo_establecimiento' => 'Tienda online',
                'descripcion' => 'Tienda virtual de productos orgánicos',
            ],
        ];

        foreach ($establecimientos as $establecimiento) {
            Establecimiento::create($establecimiento);
        }
    }
}
