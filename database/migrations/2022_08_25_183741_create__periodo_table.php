<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('ID_Periodo');
            $table->char('Periodo', 50);
            $table->timestamp('Fecha_Inicio');
            $table->timestamp('Fecha_Fin');
            $table->tinyInteger('Estatus')->default(1)->comment('1 = Activo / 0 = Desactivado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo');
    }
}
