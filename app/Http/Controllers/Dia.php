<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class Dia
{
    private $Dias = array();

    /**
     * Se agregan 7 dias a partir de una fecha, dentro de un periodo de tiempo definido.
     * Sirve para calcular todos los dias que se va a impartir una clase
     * dentro de un periodo escolar
     */
    public function CalculaDiasEnRango(string $Inicia_Rango, string $Fin_Rango, string $Fecha)
    {
        $Fecha = new Carbon($Fecha);
        $Inicia_Rango = new Carbon($Inicia_Rango);
        $Fin_Rango = new Carbon($Fin_Rango);

        $i = 0;

        echo "Fecha Inicia Rango: $Inicia_Rango\n";
        echo "Fecha Fin Rango: $Fin_Rango\n";
        echo "Fecha: $Fecha\n";

        while (true) {

            //Valida que el dia se encuentre dentro del rango del periodo
            if (!$this->RevisarDiaEnRango($Inicia_Rango, $Fin_Rango, $Fecha)) {
                return $this;
            }

            $this->Dias[$i] = $Fecha->toDateTimeString();
            $Fecha = $Fecha->addDays(7);
            $i++;
        }
    }

    /**
     * Valida si un dia se encuentra dentro de una rango de fechas
     */
    public function RevisarDiaEnRango(string $Inicia_Rango, string $Fin_Rango, string $Fecha)
    {
        $Inicia_Rango = strtotime($Inicia_Rango);
        $Fin_Rango = strtotime($Fin_Rango);
        $Fecha = strtotime($Fecha);

        if (($Fecha >= $Inicia_Rango) && ($Fecha <= $Fin_Rango)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Se encarga de retornar el atributo Dias
     */
    public function ObtenerDias()
    {
        return $this->Dias;
    }
}
