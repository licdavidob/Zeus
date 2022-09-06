<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Controladores
use App\Http\Controllers\Controller;
use App\Http\Controllers\Profesor;

//Modelos
use App\Models\Clase as Modelo_Clase;

class Clase extends Controller
{
    private $ID_Clase;
    private $Materia;
    private $Secuencia;
    private $Profesor;
    private $Salon;
    private $Periodo;
    private $Estatus;

    public function ClaseporID($id)
    {
        $ProfesorBusqueda = new Profesor();

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

    public function ObtenerClase()
    {
        $Clase["ID_Clase"] = $this->ID_Clase;
        $Clase["Materia"] = $this->Materia;
        $Clase["Secuencia"] = $this->Secuencia;
        $Clase["Profesor"] = $this->Profesor;
        $Clase["Salon"] = $this->Salon;
        $Clase["Periodo"] = $this->Periodo;
        $Clase["Estatus"] = $this->Estatus;
        return $Clase;
    }
}
