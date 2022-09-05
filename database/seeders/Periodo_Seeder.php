<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Periodo;

class Periodo_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::query()->delete();
        $Fecha_Inicio = Carbon::create(2021, 7, 31, 0);
        $Fecha_Fin = Carbon::create(2022, 1, 31, 0);

        for ($i = 1; $i <= 5; $i++) {
            $Fecha_Inicio->addMonth(6);
            $Fecha_Fin->addMonth(6);
            Periodo::create([
                'Periodo' => "Periodo $i",
                'Fecha_Inicio' => $Fecha_Inicio,
                'Fecha_Fin' => $Fecha_Fin,
            ]);
        }
    }
}
