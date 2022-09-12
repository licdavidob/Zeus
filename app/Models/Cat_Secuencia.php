<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat_Secuencia extends Model
{
    use HasFactory;

    //Se define el nombre de la tabla
    protected $table = 'cat_secuencia';

    //Se define el nombre de la columna primaria de la tabla
    public function getKeyName()
    {
        return "ID_Secuencia";
    }

    public function Clase()
    {
        return $this->hasMany(Cat_Secuencia::class, 'ID_Clase', 'ID_Clase');
    }
}
