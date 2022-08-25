<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeySalonIncidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salon_incidencia', function (Blueprint $table) {
            $table->bigInteger('ID_Salon')->unsigned();
            $table->foreign('ID_Salon')->references('ID_Salon')->on('cat_salon');

            $table->bigInteger('ID_Incidencia')->unsigned();
            $table->foreign('ID_Incidencia')->references('ID_Incidencia')->on('incidencia');
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
