<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatCategoriaSalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_categoria_salon', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('ID_Categoria_Salon');
            $table->char('Categoria', 50);
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
        Schema::dropIfExists('cat_categoria_salon');
    }
}
