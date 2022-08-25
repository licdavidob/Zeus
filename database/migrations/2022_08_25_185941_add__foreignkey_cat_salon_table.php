<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeyCatSalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cat_salon', function (Blueprint $table) {
            $table->bigInteger('ID_Edificio')->unsigned();
            $table->foreign('ID_Edificio')->references('ID_Edificio')->on('cat_edificio');

            $table->bigInteger('ID_Categoria_Salon')->unsigned();
            $table->foreign('ID_Categoria_Salon')->references('ID_Categoria_Salon')->on('cat_categoria_salon');
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
