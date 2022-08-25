<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatEdificioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_edificio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('ID_Edificio');
            $table->char('Nombre', 50);
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
        Schema::dropIfExists('cat_edificio');
    }
}
