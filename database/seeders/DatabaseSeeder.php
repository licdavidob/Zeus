<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Cat_Categoria_Salon_Seeder::class,
            Cat_Edificio_Seeder::class,
            Cat_Materia_Seeder::class,
            Cat_Profesor_Seeder::class,
            Cat_Salon_Seeder::class,
            Cat_Secuencia_Seeder::class,
            Periodo_Seeder::class,
        ]);
    }
}
