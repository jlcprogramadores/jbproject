<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_familias', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('familia_id');
            $table->foreign('familia_id')
                ->references('id')
                ->on('familias');
            $table->string('nombre');
            $table->string('descripcion');
            $table->boolean('es_activo');
            $table->string('usuario_edito');
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
        Schema::dropIfExists('categorias_familias');
    }
}
