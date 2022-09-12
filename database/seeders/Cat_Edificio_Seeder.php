<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cat_Edificio;

class Cat_Edificio_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat_Edificio::query()->delete();
        for ($i = 1; $i <= 5; $i++) {
            Cat_Edificio::create([
                'Edificio' => "Edificio $i"
            ]);
        }
    }
}
