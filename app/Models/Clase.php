<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    //Se define el nombre de la tabla
    protected $table = 'clase';

    //Se define el nombre de la columna primaria de la tabla
    public function getKeyName()
    {
        return "ID_Clase";
    }

    //Catálogos
    public function Cat_Secuencia()
    {
        return $this->belongsTo(Cat_Secuencia::class, 'ID_Secuencia', 'ID_Secuencia');
    }

    public function Cat_Salon()
    {
        return $this->belongsTo(Cat_Salon::class, 'ID_Salon', 'ID_Salon');
    }

    public function Cat_Profesor()
    {
        return $this->belongsTo(Cat_Profesor::class, 'ID_Profesor', 'ID_Profesor');
    }

    public function Cat_Materia()
    {
        return $this->belongsTo(Cat_Materia::class, 'ID_Materia', 'ID_Materia');
    }

    public function Periodo()
    {
        return $this->belongsTo(Periodo::class, 'ID_Periodo', 'ID_Periodo');
    }
}
