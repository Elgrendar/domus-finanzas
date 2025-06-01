<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Alimentación',
                'descripcion' => 'Gastos en comida y supermercado',
                'tipo_categoria' => 'gasto',
                'icono' => 'bi bi-fork-knife',
                'color' => '#FF5733',
            ],
            [
                'nombre' => 'Transporte',
                'descripcion' => 'Gastos en movilidad y transporte',
                'tipo_categoria' => 'gasto',
                'icono' => 'bi bi-bus-front',
                'color' => '#33C3FF',
            ],
            [
                'nombre' => 'Salario',
                'descripcion' => 'Ingresos por trabajo o nómina',
                'tipo_categoria' => 'ingreso',
                'icono' => 'bi bi-receipt',
                'color' => '#28A745',
            ],
            [
                'nombre' => 'Ventas',
                'descripcion' => 'Ingresos por ventas',
                'tipo_categoria' => 'ingreso',
                'icono' => 'bi bi-basket',
                'color' => '#FFC107',
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
