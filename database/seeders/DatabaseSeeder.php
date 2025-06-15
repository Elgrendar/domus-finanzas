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
        // Usuario::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@localhost.com',
            'password' => '$2y$12$Jpr6UZ8x4AP8Um8cugQzX.hFeBs28oipi9cwWhXbtJBxkEb015IqK',//HASH of administrator
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
