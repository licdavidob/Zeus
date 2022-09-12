<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Dia
{
    private $Dias = array();

    public function ObtenerDias($Inicio_Periodo, $Fin_Periodo, $Clase)
    {
        $Clase = new Carbon($Clase);
        $Inicio_Periodo = new Carbon($Inicio_Periodo);
        $Fin_Periodo = new Carbon($Fin_Periodo);

        $Bandera = true;
        $i = 0;
        $Hora = $Clase->toTimeString();
        /**
         * TODO: Encontrar la manera de mejorar este código, ya que tengo que guardar la variable
         * TODO: de la hora para no perderla al momento de hacer ejecutar le método "NEXT()" dentro del while
         */
        while ($Bandera) {
            if ($this->RevisarDiaEnRango($Inicio_Periodo, $Fin_Periodo, $Clase)) {
                $this->Dias[$i] = "{$Clase->toDateString()} $Hora";
                $Clase = $Clase->next();
                $i++;
            } else {
                $Bandera = false;
            }
        }
        return $this;
    }

    public function RevisarDiaEnRango($FechaInicio, $FechaFin, $Fecha)
    {
        $FechaInicio = strtotime($FechaInicio);
        $FechaFin = strtotime($FechaFin);
        $Fecha = strtotime($Fecha);

        if (($Fecha >= $FechaInicio) && ($Fecha <= $FechaFin)) {
            return true;
        } else {
            return false;
        }
    }
}
