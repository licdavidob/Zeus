<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Controladores
use App\Http\Controllers\Controller;
use Carbon\Carbon;

//Modelos
use App\Models\Evento as Modelo_Evento;

class Evento extends Controller
{
    private $ID_Evento;
    private $Fecha_Inicio;
    private $Fecha_Fin;

    //Métodos para registrar una Evento

    public function RegistrarEvento($Evento)
    {
        $this->Fecha_Inicio = $Evento['Fecha_Inicio'];
        $this->Fecha_Fin = $Evento['Fecha_Fin'];

        Modelo_Evento::create([
            'Fecha_Inicio' => $this->Fecha_Inicio,
            'Fecha_Fin' => $this->Fecha_Fin,
        ]);

        $EventoInsertado = Modelo_Evento::select('ID_Evento')->latest('ID_Evento')->first();
        $this->ID_Evento = $EventoInsertado['ID_Evento'];

        return $this;
    }

    //Metodos de busqueda para las clases

    public function EventoporID($id)
    {
        $BusquedaEvento = Modelo_Evento::findOrFail($id);
        $this->ID_Evento = $BusquedaEvento->ID_Evento;
        $this->Fecha_Inicio = $BusquedaEvento->Fecha_Inicio;
        $this->Fecha_Fin = $BusquedaEvento->Fecha_Fin;
        return $this;
    }

    //Métodos para obtener los datos de un evento

    public function ObtenerEvento()
    {
        $Evento["ID_Evento"] = $this->ID_Evento;
        $Evento["Fecha_Inicio"] = $this->Fecha_Inicio;
        $Evento["Fecha_Fin"] = $this->Fecha_Fin;
        return $Evento;
    }

    public function ObtenerFecha_Inicio()
    {
        return $this->Fecha_Inicio;
    }

    public function ObtenerFecha_Fin()
    {
        return $this->Fecha_Fin;
    }

    public function ObtenerEventoID()
    {
        return $this->ID_Evento;
    }
}
