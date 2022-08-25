<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatSecuenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_secuencia', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('ID_Secuencia');
            $table->char('Secuencia', 50);
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
        Schema::dropIfExists('cat_secuencia');
    }
}
