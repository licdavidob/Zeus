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
    protected $Fecha_Inicio;
    protected $Fecha_Fin;

    //Métodos para registrar un evento

    /**
     * Permite registrar un evento recibiendo como parametro un arreglo con
     * los campos de la fecha inicio y la fecha fin del evento
     */
    public function RegistrarEvento($Evento)
    {
        Modelo_Evento::create([
            'Fecha_Inicio' => $Evento['Fecha_Inicio'],
            'Fecha_Fin' => $Evento['Fecha_Fin'],
        ]);

        return $this;
    }

    //Metodos de busqueda de eventos

    /**
     * Busca un evento por ID y guarda los resultados
     * en los atributos de la clase
     */
    public function EventoporID($id)
    {
        $BusquedaEvento = Modelo_Evento::findOrFail($id);
        $this->ID_Evento = $BusquedaEvento->ID_Evento;
        $this->Fecha_Inicio = $BusquedaEvento->Fecha_Inicio;
        $this->Fecha_Fin = $BusquedaEvento->Fecha_Fin;
        return $this;
    }

    /**
     * Retorna el ID del último evento insertado
     */
    public function UltimoEventoInsertado()
    {
        $UltimoEvento = Modelo_Evento::select('ID_Evento')->latest('ID_Evento')->first();
        $this->ID_Evento = $UltimoEvento->ID_Evento;
        return $this;
    }

    //Métodos para obtener los datos de un evento

    /**
     * Obtiene la información de los atributos de la clase,
     * los guarda n un arreglo y los regresa
     */
    public function ObtenerEvento()
    {
        $Evento["ID_Evento"] = $this->ID_Evento;
        $Evento["Fecha_Inicio"] = $this->Fecha_Inicio;
        $Evento["Fecha_Fin"] = $this->Fecha_Fin;
        return $Evento;
    }
}
