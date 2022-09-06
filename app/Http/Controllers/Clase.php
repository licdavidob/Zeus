<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Controladores
use App\Http\Controllers\Controller;
use App\Http\Controllers\Profesor;
use App\Http\Controllers\Evento;

//Modelos
use App\Models\Clase as Modelo_Clase;

class Clase extends Controller
{
    private $ID_Clase;
    private $Fecha_Inicio;
    private $Fecha_Fin;
    private $Materia;
    private $Secuencia;
    private $Profesor;
    private $Salon;
    private $Periodo;
    private $Estatus;


    //Métodos para registrar una Clase

    public function RegistrarClase(Request $Clase)
    {

        $Evento = new Evento();

        foreach ($Clase['Dias'] as $Dia) {
            //Se registra cada evento
            $Evento->RegistrarEvento($Dia);
            $this->Fecha_Inicio = $Evento->ObtenerFecha_Inicio();
            $this->Fecha_Fin = $Evento->ObtenerFecha_Fin();

            //Se asignan atributos de la clase
            $this->Materia = $Clase['Materia'];
            $this->Secuencia = $Clase['Secuencia'];
            $this->Profesor = $Clase['Profesor'];
            $this->Salon = $Clase['Salon'];
            $this->Periodo = $Clase['Periodo'];

            //Se registra la clase
            Modelo_Clase::create([
                'ID_Evento' => $Evento->ObtenerEventoID(),
                'ID_Materia' => $this->Materia,
                'ID_Secuencia' => $this->Secuencia,
                'ID_Profesor' => $this->Profesor,
                'ID_Salon' => $this->Salon,
                'ID_Periodo' => $this->Periodo,
            ]);

            $ClaseInsertado = Modelo_Clase::select('ID_Clase')->latest('ID_Clase')->first();
            $this->ID_Clase = $ClaseInsertado['ID_Clase'];
        }
        return $this;
    }

    //Metodos de busqueda para las clases

    public function ClaseporID($id)
    {
        $ProfesorBusqueda = new Profesor();
        //TODO: Falta buscar la fecha fin e inicio :(
        $BusquedaClase = Modelo_Clase::findOrFail($id);
        $this->ID_Clase = $BusquedaClase->ID_Clase;
        $this->Materia = $BusquedaClase->Cat_Materia->Nombre;
        $this->Secuencia = $BusquedaClase->Cat_Secuencia->Secuencia;
        $this->Profesor = $ProfesorBusqueda->ProfesorporID($BusquedaClase->ID_Profesor)->NombreCompleto();
        $this->Salon = $BusquedaClase->Cat_Salon->Nombre;
        $this->Periodo = $BusquedaClase->Periodo->Periodo;
        $this->Estatus = $BusquedaClase->Estatus;
        return $this;
    }

    //Métodos para obtener los datos de una clase

    public function ObtenerClase()
    {
        $Clase["ID_Clase"] = $this->ID_Clase;
        $Clase["Fecha_Inicio"] = $this->Fecha_Inicio;
        $Clase["Fecha_Fin"] = $this->Fecha_Fin;
        $Clase["Materia"] = $this->Materia;
        $Clase["Secuencia"] = $this->Secuencia;
        $Clase["Profesor"] = $this->Profesor;
        $Clase["Salon"] = $this->Salon;
        $Clase["Periodo"] = $this->Periodo;
        $Clase["Estatus"] = $this->Estatus;
        return $Clase;
    }
}
