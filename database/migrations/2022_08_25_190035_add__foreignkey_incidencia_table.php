<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyIncidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incidencia', function (Blueprint $table) {
            $table->bigInteger('ID_Evento')->unsigned();
            $table->foreign('ID_Evento')->references('ID_Evento')->on('evento');
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
