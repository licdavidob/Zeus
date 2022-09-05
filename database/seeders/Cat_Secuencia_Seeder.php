<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat_Secuencia;

class Cat_Secuencia_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Secuencia::query()->delete();
        for ($i = 1; $i <= 5; $i++) {
            Cat_Secuencia::create([
                'Secuencia' => "Secuencia $i"
            ]);
        }
    }
}
