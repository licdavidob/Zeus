<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_Profesor;

class Profesor extends Controller
{
    private $ID_Profesor;
    private $Nombre;
    private $APaterno;
    private $AMaterno;
    private $Estatus;

    public function ProfesorporID($id)
    {
        $BusquedaProfesor = Cat_Profesor::findOrFail($id);
        $this->ID_Profesor = $BusquedaProfesor->ID_Profesor;
        $this->Nombre = $BusquedaProfesor->Nombre;
        $this->APaterno = $BusquedaProfesor->APaterno;
        $this->AMaterno = $BusquedaProfesor->AMaterno;
        $this->Estatus = $BusquedaProfesor->Estatus;
        return $this;
    }

    public function ObtenerProfesor()
    {
        $Profesor["ID_Profesor"] = $this->ID_Profesor;
        $Profesor["Nombre"] = $this->Nombre;
        $Profesor["APaterno"] = $this->APaterno;
        $Profesor["AMaterno"] = $this->AMaterno;
        $Profesor["Estatus"] = $this->Estatus;
        return $Profesor;
    }

    public function NombreCompleto()
    {
        return "$this->Nombre $this->APaterno $this->AMaterno";
    }
}
