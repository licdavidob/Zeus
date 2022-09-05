<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat_Salon;

class Cat_Salon_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Salon::query()->delete();
        for ($i = 1; $i <= 5; $i++) {
            Cat_Salon::create([
                'Nombre' => "Salon 00$i",
                'ID_Edificio' => $i,
                'ID_Categoria_Salon' => $i,
            ]);
        }
    }
}
