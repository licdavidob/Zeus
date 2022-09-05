<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat_Profesor;

class Cat_Profesor_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Profesor::query()->delete();
        for ($i = 1; $i <= 5; $i++) {
            Cat_Profesor::create([
                'Nombre' => "Profesor Nombre $i",
                'APaterno' => "Apellido Paterno",
                'AMaterno' => "Apellido Materno",
            ]);
        }
    }
}
