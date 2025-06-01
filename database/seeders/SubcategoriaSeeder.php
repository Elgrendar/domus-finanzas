<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategoria;
use App\Models\Categoria;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriaAlimentacion = Categoria::where('nombre', 'Alimentación')->first();
        $categoriaTransporte   = Categoria::where('nombre', 'Transporte')->first();
        $categoriaSalario      = Categoria::where('nombre', 'Salario')->first();

        if (!$categoriaAlimentacion || !$categoriaTransporte || !$categoriaSalario) {
            $this->command->warn('Faltan categorías base. Ejecuta primero el seeder de categorías.');
            return;
        }

        $subcategorias = [
            [
                'nombre' => 'Supermercado',
                'descripcion' => 'Compras de alimentos y bebidas',
                'categoria_id' => $categoriaAlimentacion->id,
                'icono' => 'bi bi-shop',
                'color' => '#FF8C00',
                'tipo_subcategoria' => 'gasto',
            ],
            [
                'nombre' => 'Restaurantes',
                'descripcion' => 'Comidas fuera de casa',
                'categoria_id' => $categoriaAlimentacion->id,
                'icono' => 'bi bi-fork-knife',
                'color' => '#FFB347',
                'tipo_subcategoria' => 'gasto',
            ],
            [
                'nombre' => 'Transporte público',
                'descripcion' => 'Bus, metro, etc.',
                'categoria_id' => $categoriaTransporte->id,
                'icono' => 'bi bi-train-front',
                'color' => '#5DADE2',
                'tipo_subcategoria' => 'gasto',
            ],
            [
                'nombre' => 'Salario mensual',
                'descripcion' => 'Ingreso mensual por empleo',
                'categoria_id' => $categoriaSalario->id,
                'icono' => 'bi bi-briefcase',
                'color' => '#58D68D',
                'tipo_subcategoria' => 'ingreso',
            ],
        ];

        foreach ($subcategorias as $sub) {
            Subcategoria::create($sub);
        }
    }
}
