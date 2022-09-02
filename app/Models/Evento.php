<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //Se define el nombre de la tabla
    protected $table = 'evento';

    //Se define el nombre de la columna primaria de la tabla
    public function getKeyName()
    {
        return "ID_Evento";
    }
}
