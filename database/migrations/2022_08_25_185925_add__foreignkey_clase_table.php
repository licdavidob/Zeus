<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clase', function (Blueprint $table) {
            $table->bigInteger('ID_Evento')->unsigned();
            $table->foreign('ID_Evento')->references('ID_Evento')->on('evento');

            $table->bigInteger('ID_Secuencia')->unsigned();
            $table->foreign('ID_Secuencia')->references('ID_Secuencia')->on('cat_secuencia');

            $table->bigInteger('ID_Materia')->unsigned();
            $table->foreign('ID_Materia')->references('ID_Materia')->on('cat_materia');

            $table->bigInteger('ID_Profesor')->unsigned();
            $table->foreign('ID_Profesor')->references('ID_Profesor')->on('cat_profesor');

            $table->bigInteger('ID_Salon')->unsigned();
            $table->foreign('ID_Salon')->references('ID_Salon')->on('cat_salon');

            $table->bigInteger('ID_Periodo')->unsigned();
            $table->foreign('ID_Periodo')->references('ID_Periodo')->on('periodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
