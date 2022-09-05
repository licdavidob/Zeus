<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat_Categoria_Salon;

class Cat_Categoria_Salon_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Categoria_Salon::query()->delete();
        for ($i = 1; $i <= 5; $i++) {
            Cat_Categoria_Salon::create([
                'Categoria' => "Categoria $i"
            ]);
        }
    }
}
