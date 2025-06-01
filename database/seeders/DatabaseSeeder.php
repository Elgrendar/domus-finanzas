<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rafa Campanero',
            'email' => 'info@rafacampanero.es',
        ]);
        $this->call([
            FormaDePagoSeeder::class,
            EstablecimientoSeeder::class,
            CuentaSeeder::class,
            CategoriaSeeder::class,
            SubcategoriaSeeder::class,
            MovimientoSeeder::class,
        ]);
    }
}
