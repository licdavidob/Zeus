<?php

namespace App\Http\Controllers;

//Controladores
use App\Http\Controllers\Profesor;
use App\Http\Controllers\Dia;
use Illuminate\Http\Request;

//Modelos
use App\Models\Clase as Modelo_Clase;

class Clase
{
    private $ID_Clase;
    private $Materia;
    private $Secuencia;
    private $Profesor;
    private $Salon;
    private $HorarioInicio;
    private $HorarioFin;
    private $Periodo;
    private $Estatus;


    //Métodos para registrar una clase

    /**
     * Permite registrar una clase recibiendo como parametro un json
     * con la información requerida. Toma un arreglo de dias dentro
     * del JSON y registra cada clase con su respectivo evento del dia
     */
    public function RegistrarClase(Request $Clase)
    {
        $Evento = new Evento();
        foreach ($Clase->Dias as $Dia) {

            // Se registra cada evento
            $Evento->RegistrarEvento($Dia)->UltimoEventoInsertado();

            //Se registra la clase 
            Modelo_Clase::create([
                'ID_Evento' => $Evento->ID_Evento,
                'ID_Materia' => $Clase->Materia,
                'ID_Secuencia' => $Clase->Secuencia,
                'ID_Profesor' => $Clase->Profesor,
                'ID_Salon' => $Clase->Salon,
                'ID_Periodo' => $Clase->Periodo,
            ]);
        }
        return $this;
    }

    //Metodos de busqueda para las clases

    /**
     * Busca una clase por ID y guarda los resultados en los
     * atributos de la clase
     */
    public function ClaseporID($id_Clase)
    {
        $Evento = new Evento();
        $Dia = new Dia();
        $ProfesorBusqueda = new Profesor();

        //Se realiza la búsqueda de la clase 
        $BusquedaClase = Modelo_Clase::findOrFail($id_Clase);

        //Se realiza la busqueda del evento que pertence a la clase
        $Evento->EventoporID($BusquedaClase->ID_Evento);

        //Se asignan los atributos de la clase
        $this->ID_Clase = $BusquedaClase->ID_Clase;
        $this->Materia = $BusquedaClase->Cat_Materia->Materia;
        $this->Secuencia = $BusquedaClase->Cat_Secuencia->Secuencia;
        $this->Profesor = $ProfesorBusqueda->ProfesorporID($BusquedaClase->ID_Profesor)->NombreCompleto();
        $this->Salon = $BusquedaClase->Cat_Salon->Salon;
        $this->HorarioInicio = $Dia->CalculaDiasEnRango($BusquedaClase->Periodo->Fecha_Inicio, $BusquedaClase->Periodo->Fecha_Fin, $Evento->Fecha_Inicio)->ObtenerDias();
        $this->HorarioFin = $Dia->CalculaDiasEnRango($BusquedaClase->Periodo->Fecha_Inicio, $BusquedaClase->Periodo->Fecha_Fin, $Evento->Fecha_Fin)->ObtenerDias();
        $this->Periodo = $BusquedaClase->Periodo->Periodo;
        $this->Estatus = $BusquedaClase->Estatus;
        return $this;
    }

    /**
     * Busca todas las clases que pertenezcan a una secuencia y retorna
     * un arreglo con la informacion de las mismas
     */
    public function ClasesporSecuencia($id_Secuencia)
    {
        $BusquedaClases = Modelo_Clase::select('ID_Clase')->where('ID_Secuencia', $id_Secuencia)->get();
        $i = 0;
        foreach ($BusquedaClases as $Clase) {
            $this->ClaseporID($Clase->ID_Clase);
            $Clases[$i] = $this->ObtenerClase();
            $i++;
        }
        return $Clases;
    }

    public function DiasDeUnaClase($Clase)
    {
        $DiasDeUnaClase = new Dia();

        $IniciaPeriodo = $Clase->Periodo->Fecha_Inicio;
        $FinPeriodo = $Clase->Periodo->Fecha_Fin;

        $DiasDeUnaClase->CalculaDiasEnRango($IniciaPeriodo, $FinPeriodo, $this->Fecha_Inicio);
    }

    /**
     * Retorna el ID de la última clase insertada 
     */
    public function UltimaClaseInsertada()
    {
        $UltimaClase = Modelo_Clase::select('ID_Clase')->latest('ID_Clase')->first();
        $this->ID_Clase = $UltimaClase->ID_Clase;
        return $this;
    }

    //Métodos para obtener los datos de una clase

    /**
     * Obtiene la información de los atributos de la clase,
     * los guarda en un arreglo y lo regresa
     */
    public function ObtenerClase()
    {
        $Clase["ID_Clase"] = $this->ID_Clase;
        $Clase["Materia"] = $this->Materia;
        $Clase["Secuencia"] = $this->Secuencia;
        $Clase["Profesor"] = $this->Profesor;
        $Clase["Salon"] = $this->Salon;
        $Clase["HorarioInicio"] = $this->HorarioInicio;
        $Clase["HorarioFin"] = $this->HorarioFin;
        $Clase["Periodo"] = $this->Periodo;
        $Clase["Estatus"] = $this->Estatus;
        return $Clase;
    }
}
